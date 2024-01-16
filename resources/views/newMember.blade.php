@include('pagetop')

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            <h2 class="scrabble">Add new member</h2>
        </div>

        <form method="POST" action="new-member">
            <table>
                @csrf
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td>email</td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button class="scrabble" type="submit">Add member</button></td>
                </tr>
            </table>
        </form>

    </div>
@include('pagebottom')
