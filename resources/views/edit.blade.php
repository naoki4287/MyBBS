<x-app-layout>
  <div class="modal h-full bg-gray-800 text-center">
    <div class="text-center text-3xl text-white mt-20">
      編集・削除
    </div>

    <form action="/delete" method="POST" class="flex justify-end">
      @csrf
      @if ($comment)
      <input type="hidden" name="commentID" value="{{ $comment['id'] }}">
      @else
      <input type="hidden" name="replyID" value="{{ $reply['id'] }}">
      @endif
      <input type="hidden" id="confirmResult" name="confirmResult" value="">
      <x-button class="bg-red-700 hover:bg-red-600 mr-12 -mt-6">削除する</x-button>

    </form>
    
    <form class="text-center mt-16" action="{{ route('update') }}" method="POST">
      @csrf
      @if ($reply === null)
      <input type="hidden" name="commentID" value="{{ $comment['id'] }}">
      @else
      <input type="hidden" name="replyID" value="{{ $reply['id'] }}">
      @endif

      @error('comment')
      <div class="text-white text-center -mt-6">{{ $message }}</div>
      @enderror

      @if ($reply === null)
      <x-textarea  name="comment" placeholder="編集してください">{{ $comment['comment'] }}</x-textarea>
      <br>
      @else
      <x-textarea  name="reply" placeholder="編集してください">{{ $reply['reply'] }}</x-textarea>
      
      <br>
      @endif
      <div class="space-x-48">
        <x-a_back class="text-white">戻る</x-a_back>
        <x-button class="bg-green-700 hover:bg-green-600">編集を完了する</x-button>
      </div>
    </form>
  </div>
  <script type="module" src="{{ asset('js/edit.js') }}"></script>
</x-app-layout>