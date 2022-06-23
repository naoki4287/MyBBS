<x-app-layout>
  <div class="">
    <div class="text-center text-3xl mt-20">
      編集・削除
    </div>

    <form action="/delete" method="POST" class="float-right">
      @csrf
       <input type="hidden" name="commentID" value="{{ $comment['id'] }}">
       <input type="hidden" id="confirmResult" name="confirmResult" value="">
      <button type="submit" id="deleteBtn" class="mr-12 p-2 text-white bg-red-700 rounded-md float-right">削除する</button>
    </form>
    
    <form class="text-center mt-32" action="{{ route('update') }}" method="POST">
      @csrf
      <input type="hidden" name="commentID" value="{{ $comment['id'] }}">
      <input type="hidden" name="replyID" value="{{ $reply['id'] }}">
      {{-- @error('question')
      <div class="text-white text-center relative bottom-4">{{ $message }}</div>
      @enderror --}}
      @if ($reply === null)
      <textarea name="comment" id="" cols="30" rows="10" placeholder="編集してください" class="w-8/12 my-4 bg-gray-700 text-white rounded-md outline-none">{{ $comment['comment'] }}</textarea><br>
      @else
      <textarea name="reply" id="" cols="30" rows="10" placeholder="編集してください" class="w-8/12 my-4 bg-gray-700 text-white rounded-md outline-none">{{ $reply['reply'] }}</textarea><br>
      @endif
      <div class="space-x-48">
        <a href="/" class="inline-block w-2/12 my-4 p-2 hover:text-white rounded-md  hover:bg-gray-600">戻る</a>
        <button type="submit" class="w-2/12 mt-12 p-2 text-white rounded-md bg-green-700">編集を完了する</button>
      </div>
    </form>
  </div>
  <script type="module" src="{{ asset('js/edit.js') }}"></script>
</x-app-layout>