<x-card>

    <h5 class="mb-4">

        Audit Information

    </h5>

    <x-info-row label="Created By">

        {{ $createdBy }}

    </x-info-row>

    <x-info-row label="Created At">

        {{ $createdAt }}

    </x-info-row>

    <x-info-row label="Updated By">

        {{ $updatedBy }}

    </x-info-row>

    <x-info-row label="Updated At">

        {{ $updatedAt }}

    </x-info-row>

</x-card>