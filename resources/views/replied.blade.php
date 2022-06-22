<x-app-layout>
  <div>
    <div class="flex justify-end">
      <a href="/" class="mt-8 mr-12 px-6 py-2 text-white rounded-md  bg-blue-600">戻る</a>
    </div>
    <div class="inline-block ml-4 mt-4">{{ $comment['name'] }}</div>
    <div class="inline-block ml-4  mt-4 float-right">{{ $comment->created_at }}</div>
    <div class="mt-1 ml-4 border-b-2 border-gray-700">{{ $comment['comment'] }}</div>

    @foreach ($replies as $reply)
    <span class="mt-1 ml-4">{{ $reply['name'] }}</span>
    <span class="ml-4 float-right">{{ $reply->created_at }}</span>
    <div class="mt-1 ml-4 border-b-2 border-gray-700">{{ $reply['reply'] }}</div>      
    @endforeach

  </div>
</x-app-layout>