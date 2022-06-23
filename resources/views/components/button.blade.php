<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-2/12 mt-12 p-2 text-white rounded-md']) }}>
  {{ $slot }}
</button>
