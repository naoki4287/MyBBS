<x-app-layout>
  <div class=" text-center">
    {{-- リプライを送るコメントを表示 --}}
    <div class="mt-12 ml-8 px-12 py-4  border-2 border-gray-700 inline-block rounded-md">
      <div class="mb-2">{{ $comment['name'] }}</div>
      <div class="">{{ $comment['comment'] }}</div>
    </div>
    
    
      <form action="/response" method="POST">
        @csrf
        <input type="hidden" name="commentID" value="{{ $comment['id'] }}">
        <input type="text" name="name" placeholder="名前" autofocus  autocomplete="off" class="w-8/12 mt-8 mb-4 bg-gray-700 rounded-md text-white outline-none"><br>
        <textarea name="reply" cols="" rows="10" placeholder="いま暇な人いる？" class="w-8/12 my-4 bg-gray-700 text-white rounded-md outline-none"></textarea>
        <div class="space-x-48">
          <a href="/" class="my-4 p-2 hover:text-white rounded-md  hover:bg-gray-600">キャンセル</a>
          <button type="submit" class="my-4 p-2 text-white rounded-md bg-red-700">投稿する</button>
        </div>
      </form>
    </div>
</x-app-layout>