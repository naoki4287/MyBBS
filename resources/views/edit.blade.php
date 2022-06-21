<x-app-layout>
  <div>
    <div class="text-center text-3xl mt-20">
      編集ページ
    </div>

    <form action="/delete" method="POST" class="float-right">
      @csrf
       <input type="hidden" name="commentID" value="{{ $comment['id'] }}">
      <button type="submit" id="deleteBtn" class=" mr-12 p-2 text-white rounded-md bg-red-400 float-right">削除する</button>
    </form>
    
    <form class="text-center mt-32" action="{{ route('update') }}" method="POST">
      @csrf
      <input type="hidden" name="commentID" value="{{ $comment['id'] }}">
      {{-- @error('question')
      <div class="text-white text-center relative bottom-4">{{ $message }}</div>
      @enderror --}}
      <textarea name="comment" id="" cols="30" rows="10" placeholder="編集してください" class="w-8/12 my-4 bg-gray-300 text-whit rounded-md outline-none">{{ $comment['comment'] }}</textarea><br>
      <button type="submit" class="inline-block w-2/12 mt-12 p-2 text-white rounded-md bg-red-700">完了する</button>
    </form>
  </div>
  <script type="module" src="{{ asset('js/edit.js') }}"></script>
</x-app-layout>