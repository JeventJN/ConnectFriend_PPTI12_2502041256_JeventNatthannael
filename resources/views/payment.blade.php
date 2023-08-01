<h1>Payment Page</h1>
<p>Amount to Pay: ${{ $user->price }}</p>
<form action="{{ route('processPayment') }}" method="POST">
    @csrf
    <label for="payment">Enter Payment Amount:</label>
    <input type="number" name="payment" min="{{ $user->price }}" required>
    <button type="submit">Pay</button>
</form>
