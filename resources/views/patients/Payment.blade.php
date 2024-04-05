<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <div class="max-w-lg mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="px-6 py-4">
                <h2 class="text-2xl font-semibold text-gray-800">Thanh toán</h2>
                <p class="text-sm text-gray-600 mt-1">Vui lòng nhập thông tin thanh toán của bạn.</p>
            </div>
            <form class="p-6">
                <div class="mb-4">
                    <label for="customer_name" class="block text-gray-800 text-sm font-semibold mb-2">Tên khách hàng</label>
                    <input type="text" id="customer_name" class="form-input w-full">
                </div>
                <div class="mb-4">
                    <label for="doctor_name" class="block text-gray-800 text-sm font-semibold mb-2">Tên bác sĩ</label>
                    <input type="text" id="doctor_name" class="form-input w-full">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="start_time" class="block text-gray-800 text-sm font-semibold mb-2">Giờ bắt đầu</label>
                        <input type="time" id="start_time" class="form-input w-full">
                    </div>
                    <div class="mb-4">
                        <label for="end_time" class="block text-gray-800 text-sm font-semibold mb-2">Giờ kết thúc</label>
                        <input type="time" id="end_time" class="form-input w-full">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-800 text-sm font-semibold mb-2">Giá</label>
                    <input type="number" id="price" class="form-input w-full">
                </div>
                <div class="mb-4">
                    <label for="payment_method" class="block text-gray-800 text-sm font-semibold mb-2">Phương thức thanh toán</label>
                    <select id="payment_method" class="form-select w-full">
                        <option value="credit_card">Thẻ tín dụng</option>
                        <option value="paypal">PayPal</option>
                        <option value="bank_transfer">Chuyển khoản ngân hàng</option>
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Xác nhận thanh toán</button>
            </form>
        </div>
    </div>
</body>
</html>
