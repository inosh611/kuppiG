<form action="userlogin" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" ><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <button type="submit">Registration</button>
</form>