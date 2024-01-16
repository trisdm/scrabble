@include('pagetop')

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            <h2 class="scrabble">Recent games</a>
        </div>
        <a class="scrabble" href="add-game">click to add a new game</a>

        <ul>
            @foreach($games as $game)
            <li class="scrabble">
                Game id {{ $game['id'] }} was Played on {{ str_replace("00:00:00", "", $game['date']) }}
                <br>

                @foreach($game['memberGames'] as $member)
                    @if($member['winner'])
                        {{ $member['name'] }} was the winner!!
                        <br>
                    @endif


                @endforeach

                    Players @foreach($game['memberGames'] as $member)
                            {{ $member['name'] }} scored  {{ $member['user_score'] }}


                            <br>
                @endforeach
                <hr class="scrabble">
            </li>
            @endforeach

        </ul>
    </div>
@include('pagebottom')
