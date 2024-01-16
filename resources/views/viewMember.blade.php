@include('pagetop')

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            Member
        </div>
        <div>
{{--            {{$member}}--}}
            <table>

            @foreach($member as $member)
                <tr>
                    <td>Name</td>
                    <td>
                        {{ $member['name'] }}
                    </td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>{{ $member['email']}}</td>
                </tr>

                <tr>
                    <td><td>
                    <td><a class="scrabble" href="edit-member?id={{$member['id']}}">edit</a></td>
                </tr>
            @endforeach
            </table>
        </div>
    </div>
@include('pagebottom')
