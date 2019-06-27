<form method="POST" action="/form">
    @csrf
    @honeypot
    姓名：<input type="text" name="name">
    <button type="submit">提交</button>
</form>
