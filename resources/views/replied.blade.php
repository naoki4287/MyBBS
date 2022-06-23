<x-app-layout>
  <div>
    <div class="flex justify-end">
      <a href="/" class="mt-8 mr-12 px-6 py-2 text-white rounded-md  bg-gray-700">戻る</a>
    </div>
    
      <div class="mt-8 w-full">
        <span class="ml-4">{{ $comment['name'] }}</span>
        <span class="mx-8 float-right">{{ $comment['created_at'] }}</span>
        <div class="inline-block ml-4  float-right"><a class="p-1" href="/edit/{{ $comment['id'] }}">編集・削除</a></div>
        <a class="px-4  float-right" href="/reply/{{ $comment['id'] }}"><i class="fa-solid fa-lg fa-reply"></i><a>
        <a class="" href="/replied/{{ $comment['id'] }}"><div class="ml-4 border-b-2 border-gray-700 mt-1">{{ $comment['comment'] }}</div></a>
      </div>

    @foreach ($replies as $reply)
    <div class="mt-2">
      <span class="mt-1 ml-4">{{ $reply['name'] }}</span>
      <span class="mx-8 float-right">{{ $reply->created_at }}</span>
      <div class="inline-block ml-4  float-right"><a class="p-1" href="/edit/{{ $reply['id'] }}">編集・削除</a></div>

      <div class="mt-1 ml-4 border-b-2 border-gray-700">{{ $reply['reply'] }}</div>      
    </div>
    @endforeach

  </div>
</x-app-layout>