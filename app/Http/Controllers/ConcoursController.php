<?php

namespace App\Http\Controllers;

use App\Exports\CandidatPresence;
use App\Models\Mention;
use App\Models\Vague;
use Maatwebsite\Excel\Facades\Excel;
use ZipArchive;
use Illuminate\Support\Facades\Storage;

class ConcoursController extends Controller
{
    public function index()
    {
        $vagues = Vague::with('concours')->get();
        return view('dashboard.vague.index_scolarite', compact('vagues'));
    }

    public function show(String $id)
    {
        $vagues = Vague::findOrFail($id);
        return view('dashboard.vague.show_scolarite', compact('vagues'));
    }
    public function presence(String $id)
    {
        $mentions = Mention::all();
        $zipFile = 'Presence.zip';
        $zip = new ZipArchive;
        $zip->open(storage_path('app/' . $zipFile), ZipArchive::CREATE);

        foreach ($mentions as $mention) {
            $fileName = str_replace(" ", "_", $mention->design) . '.xlsx';
            Excel::store(new CandidatPresence($mention->id, $id), $fileName, 'local');
            $zip->addFile(storage_path('app/' . $fileName), $fileName);
        }
        $zip->close();
        foreach ($mentions as $mention) {
            $fileName = str_replace(" ", "_", $mention->design) . '.xlsx';
            Storage::delete($fileName);
        }
        return response()->download(storage_path('app/' . $zipFile))->deleteFileAfterSend(true);
    }
}
