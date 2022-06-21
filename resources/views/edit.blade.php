<x-app-layout>
  <div>
    <div class="text-center text-3xl mt-20">
      編集ページ
    </div>
    <form class="text-center mt-32" action="{{ route('update') }}" method="POST">
      @csrf
      {{-- @error('question')
      <div class="text-white text-center relative bottom-4">{{ $message }}</div>
      @enderror --}}
      <input type="hidden" name="commentID" value="{{ $comment['id'] }}">
      <textarea name="comment" id="" cols="30" rows="10" placeholder="編集してください" class="w-8/12 my-4 bg-gray-300 text-whit rounded-md outline-none">{{ $comment['comment'] }}</textarea><br>
      <button type="submit" class="w-2/12 mt-12 p-2 text-white rounded-md bg-red-700">投稿する</button>

    </form>
  </div>
</x-app-layout>