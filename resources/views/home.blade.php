<x-app-layout>
  <div>
    <div class="text-center text-3xl my-12">MyBBS</div>
    <div class="">
      @foreach ($comments as $comment)
      <div class="mt-2 w-full">
        <a href="/edit/{{ $comment->id }}">
          <span class="ml-4">{{ $comment->name }}</span><span class="ml-4 float-right">{{ $comment->created_at }}</span>
         
          <div class="border-b-2 border-gray-700 mt-1 ml-4">{{ $comment->comment }}</div>
        </a>
      </div>
      @endforeach
      <div class="mt-12 flex justify-center">
        {{ $comments->appends(['sort' => $sort])->links('tailwind') }}
      </div>
    </div>
    
    <div id="modal" class="modal hidden w-full h-full bg-gray-800 z-10 text-center">
      <form action="post" method="POST">
        @csrf
        <input type="text" name="name" placeholder="名前" autofocus  autocomplete="off" class="w-8/12 mt-8 mb-4 bg-gray-700 rounded-md text-white outline-none"><br>
        <textarea name="comment" cols="" rows="10" placeholder="いま暇な人いる？" class="w-8/12 my-4 bg-gray-700 text-white rounded-md outline-none"></textarea>
        <div class="space-x-48">
          <button type="button" id="cancelBtn" class="my-4 p-2 text-white rounded-md  hover:bg-gray-600">キャンセル</button>
          <button type="submit" class="my-4 p-2 text-white rounded-md bg-red-700">投稿する</button>
        </div>
      </form>
    </div>
    <div id="mask" class="hidden fixed inset-0 z-0"></div>
    
    <div class="flex justify-end">
      <i id="postBtn" class="fas fa-4x fa-plus-circle text-gray-700  z-10"></i>
    </div>
    
  </div>
  <script type="module" src="{{ asset('js/home.js') }}"></script>
</x-app-layout>