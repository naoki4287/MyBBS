<x-app-layout>
  <div>
    <div class="text-center text-3xl my-12">MyBBS</div>
    <div class="">
      @foreach ($comments as $comment)
      <div class="mt-2 w-full">
        <span class="ml-4">{{ $comment->name }}</span>
        <span class="mx-4 float-right">{{ $comment->created_at }}</span>
        <div class="inline-block ml-4  float-right"><a class="p-1" href="/edit/{{ $comment->id }}">編集・削除</a></div>
        <a class="px-4  float-right" href="/reply/{{ $comment->id }}"><i class="fa-solid fa-lg fa-reply"></i><a>
        <span id="replyNum"></span>
        <a class="" href="/replied/{{ $comment->id }}"><div class="ml-4 border-b-2 border-gray-700 mt-1">{{ $comment->comment }}</div></a>
      </div>
      @endforeach
      <div class="link mt-12 flex justify-center">
        {{ $comments->appends(['sort' => $sort])->links('tailwind') }}
      </div>
    </div>
    
    <div id="modal" class="modal hidden w-full h-full bg-gray-800 z-10 text-center">
      <form action="post" method="POST">
        @csrf
        <input type="text" name="name" id="name" placeholder="名前" autofocus  autocomplete="off" class="w-8/12 mt-8 mb-4 bg-gray-700 rounded-md text-white outline-none"><br>
        <textarea name="comment" cols="" rows="10" placeholder="いま暇な人いる？" class="w-8/12 my-4 bg-gray-700 text-white rounded-md outline-none"></textarea>
        <div class="space-x-48">
          <a href="/" class="my-4 p-2 text-white rounded-md  hover:bg-gray-600">キャンセル</a>
          <button type="submit" class="my-4 p-2 text-white rounded-md bg-red-700">投稿する</button>
        </div>
      </form>
    </div>
    
    <div class="flex justify-end">
      <i id="postBtn" class="fas fa-4x fa-plus-circle text-gray-700  z-10 cursor-pointer"></i>
    </div>
    
  </div>
  <script>
    const comments = @json($comments);
    const replies = @json($replies);
  </script>
  <script type="module" src="{{ asset('js/home.js') }}"></script>
</x-app-layout>