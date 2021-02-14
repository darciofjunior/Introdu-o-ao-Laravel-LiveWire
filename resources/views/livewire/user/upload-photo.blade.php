<div>
    <h1>Atualizar Foto Perfil</h1>

    <form action="#" class="post" wire:submit.prevent="storagePhoto">
        <input type="file" wire:model="photo">
        @error('photo')
            {{ $message }}
        @enderror
        </br>
        <button type="submit">Upload Foto</button>
    </form>
</div>
