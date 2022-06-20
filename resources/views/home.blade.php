<x-app-layout>
  <div>
    {{-- 一覧表示機能 --}}
    <span class="ml-4">投稿者</span> <span class="ml-4">/</span> <span class="ml-4">投稿日時</span>
    <div class="border-b-2 border-gray-500 ml-4">本文</div>

    {{-- 投稿機能 --}}
    <form action="post" method="POST">
      <label>投稿者</label><input type="text"><br>
      <label>本文</label><textarea name="" id="" cols="30" rows="10"></textarea><br>
      <button type="submit" class="bg-red-500">投稿</button>
    </form>

  </div>
</x-app-layout>