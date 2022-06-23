<x-app-layout>
  <div>
    <div class="text-center text-3xl my-12">MyBBS</div>
    <div class="">
      @foreach ($comments as $comment)
      <div class="mt-2 w-full">
        <span class="ml-4">{{ $comment->name }}</span>
        <span class="mx-4 float-right">{{ $comment->created_at }}</span>
        <div class="inline-block ml-4  float-right"><a class="p-1" href="/edit/{{ $comment->id }}">編集・削除</a></div>
        <a class="px-4 float-right" href="/reply/{{ $comment->id }}"><i class="fa-solid fa-lg fa-reply"></i></a>
        <span id="replyNum"></span>
        <a href="/replied/{{ $comment->id }}"><div class="ml-4 border-b-2 border-gray-700 mt-1">{{ $comment->comment }}</div></a>
      </div>
      @endforeach
      <div class="link mt-12 flex justify-center">
        {{ $comments->appends(['sort' => $sort])->links('tailwind') }}
      </div>
    </div>
    
    <div id="modal" class="modal hidden w-full h-full bg-gray-800 z-10 text-center">
      <form action="post" method="POST">
        @csrf
        <x-input name="name" id="name" autocomplete="off"></x-input><br>
        <x-textarea  name="comment" placeholder="今暇な人いる？"></x-textarea>
        <div class="space-x-48">
          <x-a_back class="text-white">キャンセル</x-a_back>
          <x-button class="bg-red-700 hover:bg-red-600">投稿する</x-button>
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