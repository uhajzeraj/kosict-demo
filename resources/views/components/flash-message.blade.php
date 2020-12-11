@props([
  'type' => 'success',
  'colors' => [
    'success' => 'bg-green-500', 
    'error' => 'bg-red-500', 
  ],
])

<div x-data="{show: false, message: ''}"
  x-show="show"
  @flash.window="
    if (show) return;
    message = $event.detail;
    show = true;
    setTimeout(() => show = false, 2000);
  "
  {{ $attributes->merge(['class' => "{$colors[$type]} absolute right-0 z-20 mr-8"]) }}
  @include('transitions.fade-from-to-left')
  x-cloak
>
  <div class="container flex items-center justify-between p-4 mx-auto text-white">
    <span x-text="message"></span>
    <button type="button"
      class="ml-4 focus:shadow-outline focus:outline-none" 
      aria-hidden="true" 
      @click="show = false"
    >
      <span class="text-xl">&times;</span>
    </button>
  </div>
</div>
