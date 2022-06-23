<x-app-layout>
  <div class="text-center">
    <div class="mt-12 ml-8 px-12 py-4  border-2 border-gray-700 inline-block rounded-md">
      <div class="mb-2">{{ $comment['name'] }}</div>
      <div class="">{{ $comment['comment'] }}</div>
    </div>
    
    <form action="/response" method="POST">
      @csrf
      <input type="hidden" name="commentID" value="{{ $comment['id'] }}">
      <x-input name="name" autofocus autocomplete="off"></x-input><br>
      <x-textarea  name="reply" placeholder="今暇な人いる？"></x-textarea>
      <div class="space-x-48">
        <x-a_back>キャンセル</x-a_back>
        <x-button class="bg-red-700 hover:bg-red-600">投稿する</x-button>
      </div>
    </form>
  </div>
</x-app-layout>