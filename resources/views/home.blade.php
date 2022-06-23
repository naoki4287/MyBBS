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
    
    <div class="flex justify-end">
      <a href="/comment"><i id="postBtn" class="fas fa-4x fa-plus-circle text-gray-700 hover:text-gray-600 cursor-pointer"></i></a>
    </div>
    
  </div>
</x-app-layout>