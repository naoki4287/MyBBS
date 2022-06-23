<x-app-layout>
  <div class="modal h-full bg-gray-800 text-center">
    <form action="post" method="POST" class="mt-12">
      @csrf
      @error('name')
      <div class="text-white text-center mt-6 -mb-6">{{ $message }}</div>
      @enderror
      @error('comment')
      <div class="text-white text-center mt-6 -mb-6">{{ $message }}</div>
      @enderror
      <x-input name="name" id="name" autocomplete="off"></x-input><br>
      <x-textarea  name="comment" placeholder="今暇な人いる？"></x-textarea>
      <div class="space-x-48">
        <x-a_back class="text-white">キャンセル</x-a_back>
        <x-button class="bg-red-700 hover:bg-red-600">投稿する</x-button>
      </div>
    </form>
  </div>
</x-app-layout>