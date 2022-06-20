<x-app-layout>
  <div>
    {{-- 一覧表示機能 --}}
    <span class="ml-4">投稿者</span> <span class="ml-4">/</span> <span class="ml-4">投稿日時</span>
    <div class="border-b-2 border-gray-700 ml-4">本文</div>
    
    <div id="modal" class="modal hidde w-full bg-gray-800  rounded-lg absolute z-10 text-center">
      {{-- 投稿機能 --}}
      <form action="post" method="POST">
        <input type="text" name="name" placeholder="名前" autofocus autocomplete="off" class="my-4 bg-gray-700 rounded-md text-white outline-none"><br>
        <textarea name="post" cols="60" rows="10" placeholder="いま暇な人いる？" class="my-4 bg-gray-700 text-white rounded-md    outline-none"></textarea><br>
        <div class="space-x-48">
          <button type="button" class="my-4 p-2 text-white rounded-md">キャンセル</button>
          <button type="submit" class="my-4 p-2 text-white rounded-md bg-red-700">投稿する</button>

        </div>
      </form>
    </div>
    <div id="mask" class="hidden fixed inset-0 z-0"></div>

    <div class="flex justify-end">
      <i id="postBtn" class="fas fa-4x fa-plus-circle  text-gray-700 "></i>
    </div>

  </div>
  <script type="module" src="{{ asset('js/home.js') }}"></script>
</x-app-layout>