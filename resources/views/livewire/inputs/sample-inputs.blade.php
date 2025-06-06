<div>
   <x-card size="lg"  columns="3" header="Sample Form">
        <div class="col">
            <x-form.input name="name" label="Full Name" value="John Snow" />
        </div>

        <div class="col">
            <x-form.input name="email" label="Email" type="email" value="john@example.com" />
        </div>

        <div class="col">
            <x-form.input name="search" label="Search" type="search" placeholder="Search here..." icon="ni ni-zoom-split-in" grouped="true" alternative="true" />
        </div>

        <div class="col">
            <x-form.input name="phone" type="tel" label="Phone" value="40-(770)-888-444" />
        </div>

        <div class="col">
            <x-form.input name="color" type="color" label="Pick a Color" value="#5e72e4" />
        </div>

        <div class="col">
            <x-form.input name="disabled_field" label="Disabled Field" type="text" placeholder="Disabled Input" disabled="true" />
        </div>

        <div class="col">
            <x-form.input name="birthday" placeholder="Birthday" grouped="true" icon="ni ni-calendar-grid-58" />
        </div>

        <div class="col">
            <x-form.input name="success_input" placeholder="Success" isValid="true" />
        </div>

        <div class="col">
            <x-form.input name="error_input" type="email" placeholder="Invalid Email" isInvalid="true" />
        </div>
    </x-card>

    <x-card size="sm" columns="3" header="Sizes">
        <div class="col">
            <x-form.input name="name" label="Small" size="sm" value="John Snow" />
        </div>
        <div class="col">
            <x-form.input name="name" label="Defualt" value="John Snow" />
        </div>
        <div class="col">
            <x-form.input name="name" label="Large" size="lg" value="John Snow" />
        </div>
    </x-card>

    <x-card size="sm" columns="2" header="Select">
        <div class="col">
            <x-form.select
                name="language"
                label="Preferred Language"
                :options="[
                    ['value' => 'en', 'label' => 'English'],
                    ['value' => 'fr', 'label' => 'French'],
                    ['value' => 'de', 'label' => 'German'],
                ]"
                placeholder="Choose a language"
                searchable="true"
                variant="alternative"
                size="lg"
            />
        </div>
        <div class="col">
            <x-form.select
                name="tags"
                label="Select Tags"
                multiple="true"
                searchable="true"
                size="lg"
                :value="['php', 'laravel']"
                :options="[
                    ['value' => 'php', 'label' => 'PHP'],
                    ['value' => 'laravel', 'label' => 'Laravel'],
                    ['value' => 'livewire', 'label' => 'Livewire'],
                    ['value' => 'vue', 'label' => 'Vue.js'],
                ]"
            />
        </div>
    </x-card>


</div>
