<div>
    <button wire:click="$set('isLogin', true)"
        class="{{ $isLogin ? 'px-4 py-2 text-white bg-blue-500' : 'px-4 py-2 text-white bg-gray-500' }}">Login</button>
    <button wire:click="$set('isLogin', false)"
        class="{{ !$isLogin ? 'px-4 py-2 text-white bg-blue-500' : 'px-4 py-2 text-white bg-gray-500' }}">Signup</button>
    <div>
        @if($isLogin)
        <form wire:submit.prevent="login">
            <input type="email" wire:model="email" class="border p-2" placeholder="Email">
            <input type="password" wire:model="password" class="border p-2" placeholder="Password">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white">Login</button>
        </form>

        @else
        <form wire:submit.prevent="signup">
            <input type="text" wire:model="name" class="border p-2" placeholder="Name">
            <input type="email" wire:model="email" class="border p-2" placeholder="Email">
            <input type="password" wire:model="password" class="border p-2" placeholder="Password">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white">Signup</button>
        </form>
        @endif

    </div>
</div>