@include('pagetop')

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            <h2 class="scrabble">Add new game</h2>
        </div>
        <div>

            <table>
            <form method="POST" action="add-game">
                @csrf
                <tr>
                    <td>
                        <select name="player_1_id">
                            <option value="">choose a player</option>
                            @foreach($users as $user)
                                <option value="{{$user['id']}}">{{$user['name']}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="text" name="player_1_score" placeholder="add a score"></td>
                </tr>

                <tr>
                    <td>
                        <select name="player_2_id">
                            <option value="">choose a player</option>
                            @foreach($users as $user)
                                <option value="{{$user['id']}}">{{$user['name']}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="text" name="player_2_score" placeholder="add a score"></td>
                </tr>

                <tr>
                    <td>
                        <select name="player_3_id">
                            <option value="">choose a player</option>
                            @foreach($users as $user)
                                <option value="{{$user['id']}}">{{$user['name']}}</option>
                            @endforeach
                        </select>
                    </td>

                    <td><input type="text" name="player_3_score" placeholder="add a score"></td>

                </tr>

                <tr>
                    <td>
                        <select name="player_4_id">
                            <option value="">choose a player</option>
                            @foreach($users as $user)
                                <option value="{{$user['id']}}">{{$user['name']}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="text" name="player_4_score" placeholder="add a score"></td>
                </tr>


                <tr>
                    <td>Add game date</td>
                    <td>
                        <input type="text" name="day" placeholder="DD" required> -
                        <input type="text" name="month" placeholder="MM" required> -
                        <input type="text" name="year" placeholder="YYYY" required>
                    </td>
                </tr>

                <tr><td><button class="scrabble" type="submit">Add game</button></td></tr>
            </form>
            </table>
        </div>

</div>
@include('pagebottom')
