@include('pagetop')

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            <h2 class="scrabble">Members</h2>
        </div>
        <div>
            <a class="scrabble" href="new-member">Add a new member + </a>
            <hr>
            <table>
            @foreach($members as $member)
                <tr>
                    <td>
                        <a class="scrabble" href="view-member?id={{$member['id']}}">{{ $member['name'] }}</a>
                    </td>
                    <td>
                        <a class="scrabble" href="edit-member?id={{$member['id']}}">edit</a>
                    </td>
                </tr>
            @endforeach
            </table>
        </div>
    </div>
@include('pagebottom')
