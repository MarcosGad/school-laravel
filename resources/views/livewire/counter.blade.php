<div>
   <input wire:model="search" type="text" placeholder="search......"/>
   <ul>
      @foreach($users as $user)
        <li>{{$user->name}}</li>
      @endforeach

      <button wire:click="$emit('userAdded')"> Test </button>
      <p>{{$userCount}}</p>

   </ul>
</div>
