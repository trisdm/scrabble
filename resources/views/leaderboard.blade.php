@include('pagetop')
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            <h2 class="scrabble">Leaderboard</h2>
        </div>
        <table>
            <tr>
                <td>Name</td>
                <td>High score</td>
            </tr>

            @foreach($users as $user)
            <tr>
                <td>{{$user['name']}}</td>
                <td>{{$user['score']}}</td>
            </tr>
            @endforeach
        </table>
    </div>
@include('pagebottom')
