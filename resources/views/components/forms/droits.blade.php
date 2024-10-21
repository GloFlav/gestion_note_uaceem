<!-- Card Section -->
<div class="max-w-full px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Card -->
	<div class="text-center mb-8">
		<h2 class="text-2xl md:text-3xl font-bold text-[#275BA2] dark:text-neutral-200">
			DROITS ET FRAIS D'INSCRIPTION
		</h2>
	</div>
    
	<div class="bg-white rounded-xl p-4 sm:p-7 dark:bg-neutral-900">
  
      <form class="space-y-5">
        <!-- Section -->

		<div class="flex row justify-between align-center border-transparent">
			<div class="w-[48%]">
				<div class="mb-2">
					<label 
					for="matricule"
					class="font-medium text-gray-500">
						Numero de candidature
					</label>
				</div>
				<div class="relative">
					<input 
					id="matricule"
					name="matricule"
					type="text" 
					class="py-3 px-4 ps-11 block w-full bg-white border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
					placeholder="XXX/ConcZZ/YY-YY"
					>
					<button class="absolute inset-y-0 start-0 flex items-center ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
						<svg 
						class="shrink-0 size-4 text-gray-500 dark:text-neutral-500"
						xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
					</button>
				</div>
			</div>

			<div class="w-[48%]">
				<div class="mb-2">
					<label 
					for="matricule"
					class="font-medium text-gray-500">
						Nom du candidat
					</label>
				</div>
				<div class="relative">
					<input 
					id="nom"
					name="nom"
					type="text" 
					class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
					placeholder=""
					disabled
					>
				</div>
			</div>
		</div>

		<div class="flex row justify-between align-center">
			<div class="w-[48%]">
				<div class="mb-2">
					<label 
					for="matricule"
					class="font-medium text-gray-500">
						Raison
					</label>
				</div>
				<select class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
					<option name="raison" value="1" selected>Droit au test ou entretient</option>
					<option name="raison" value="2">Droit d'inscription</option>
					<option name="raison" value="3">Frais généraux</option>
				  </select>				
			</div>

			<div class="w-[48%]">
				<div class="mb-2">
					<label 
					for="matricule"
					class="font-medium text-gray-500">
						Montant par défaut (MGA)
					</label>
				</div>
				<div class="relative">
					<input 
					id="nom"
					name="nom"
					type="text" 
					class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
					placeholder=""
					disabled
					>
				</div>			
			</div>
		</div>

		<div class="flex row justify-between align-center">
			<div class="w-[48%]">
				<div class="mb-2">
					<label 
					for="matricule"
					class="font-medium text-gray-500">
						Code de payement
					</label>
				</div>
				<div class="relative">
					<input 
					id="nom"
					name="nom"
					type="text" 
					class="peer py-3 px-4  block w-full bg-gray-100 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
					placeholder="DTSPMST"
					disabled
					>
				</div>	
			</div>

			<div class="w-[48%]">
				<div class="mb-2">
					<label 
					for="matricule"
					class="font-medium text-gray-500">
						Montant à encaisser (MGA)
					</label>
				</div>
				<div class="relative">
					<input 
					id="nom"
					name="nom"
					min="0"
					max="9999999999"
					value="0"
					type="number" 
					class="peer py-3 px-4 block w-full bg-white border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
					placeholder=""
					required
					>
				</div>
			</div>
		</div>


        <div class="py-6 first:pt-0 last:pb-0  first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
			<label for="af-payment-billing-contact" class="inline-block text-sm font-medium dark:text-white">
				Billing contact
			</label>
  
			<div class="mt-2 space-y-3">
				<input id="af-payment-billing-contact" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="First Name">
				<input type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Last Name">
				<input type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Phone Number">
			</div>
        </div>
        <!-- End Section -->
  
        <!-- Section -->
        <div class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
          <label for="af-payment-billing-address" class="inline-block text-sm font-medium dark:text-white">
            Billing address
          </label>
  
          <div class="mt-2 space-y-3">
            <input id="af-payment-billing-address" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Street Address">
            <input type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Apt, Syuite, Building (Optional)">
            <div class="flex flex-col sm:flex-row gap-3">
              <input type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Zip Code">
              <select class="py-2 px-3 pe-9 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <option selected>City</option>
                <option>City 1</option>
                <option>City 2</option>
                <option>City 3</option>
              </select>
              <select class="py-2 px-3 pe-9 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <option selected>State</option>
                <option>State 1</option>
                <option>State 2</option>
                <option>State 3</option>
              </select>
            </div>
          </div>
        </div>
        <!-- End Section -->
  
        <!-- Section -->
        <div class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
          <label for="af-payment-payment-method" class="inline-block text-sm font-medium dark:text-white">
            Payment method
          </label>
  
          <div class="mt-2 space-y-3">
            <input id="af-payment-payment-method" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Name on Card">
            <input type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Card Number">
            <div class="flex flex-col sm:flex-row gap-3">
              <input type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Expiration Date">
              <input type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="CVV Code">
            </div>
          </div>
        </div>
        <!-- End Section -->
      </form>
  
      <div class="mt-5 flex justify-end gap-x-2">
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
          Cancel
        </button>
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
          Save changes
        </button>
      </div>
    </div>
    <!-- End Card -->
  </div>
  <!-- End Card Section -->