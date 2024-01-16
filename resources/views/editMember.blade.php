@include('pagetop')
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            <h2 class="scrabble">Edit Member</h2>
        </div>
        <div>
            <form method="POST" action="edit-member">
                @csrf
                <label for="exampleInputEmail1">name</label>
                <input type="text"  name="name" required="" value="{{$member[0]['name']}}" >

                <br>
                <label for="exampleInputEmail1">email</label>
                <input type="text"  name="email" required="" value="{{$member[0]['email']}}" >
                <br>
                <input type="hidden" name="user_id" required="" value="{{$member[0]['id']}}">
                <button class="scrabble" type="submit">Edit this user</button>
            </form>
            or
            <form method="POST" action="delete-member">
                @csrf
                <input type="hidden" name="user_id" required="" value="{{$member[0]['id']}}">
                <button class="scrabble" type="submit">delete this user</button>
            </form>
        </div>
    </div>
@include('pagebottom')
