<!DOCTYPE html>
<html lang="en">

<?php
// These includes will provide your header, sidebar, and navbar
include $_SERVER['DOCUMENT_ROOT'] . "/views/include/header.php";
?>

<body class="bg-gray-50 bg-gray-100">

    <div class="flex h-screen ">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/views/include/sidebar.php";
        // $date = date('Y-m-d'); // This is not needed for the notification form
        ?>

        <main class="flex w-full flex-col items-center justify-start md:ml-60">
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/views/include/navbar.php";
            ?>
            <div class="w-[85%]">
                <div class="flex items-center my-6">
                    <button class="text-gray-500 hover:text-gray-700">
                        <span class="material-icons">arrow_back</span>
                    </button>
                    <!-- Changed from "Add Coupon" to "Send Firebase Notification" -->
                    <h1 class="text-2xl font-semibold ml-2">Send Firebase Notification</h1>
                </div>
            </div>
            <!-- Form action will be where your PHP backend script handles the submission -->
            <form action="" method="POST" class="w-[85%]">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 w-full pb-10">
                    <div class="lg:col-span-2 flex flex-col gap-6">

                        <div class="bg-white p-6 rounded-lg shadow-sm">

                            <!-- Radio buttons for Send Type (Token or Topic) -->
                            <div class="radio-group mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Send To:</label>
                                <div class="flex items-center">
                                    <label class="inline-flex items-center mr-6">
                                        <input type="radio" name="send_type" value="token" checked onchange="updateTargetPlaceholder()" class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                        <span class="ml-2 text-gray-700">Specific Token</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="send_type" value="topic" onchange="updateTargetPlaceholder()" class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                        <span class="ml-2 text-gray-700">Topic</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Target Identifier (Token or Topic Name) -->
                            <div class="w-full mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="target_identifier" id="targetLabel">Target Device Token:</label>
                                <input
                                    class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                                    value="" name="target_identifier" id="target_identifier" placeholder="e.g., FCM token from browser console" type="text" required />
                                <small class="text-gray-500 text-xs mt-1 block">Enter an FCM token or a topic name (e.g., 'all_users').</small>
                            </div>

                            <!-- Notification Title -->
                            <div class="w-full mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="title">Notification Title</label>
                                <input
                                    class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                                    value="" name="title" id="title" placeholder="e.g., New Update Available!" type="text" required />
                            </div>

                            <!-- Notification Body -->
                            <div class="w-full mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="body">Notification Body</label>
                                <textarea
                                    class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                                    name="body" id="body" rows="4" placeholder="e.g., Discover what's new in our latest release." required></textarea>
                            </div>

                            <!-- Image URL (Optional) -->
                            <div class="w-full mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="image_url">Image URL (Optional)</label>
                                <input
                                    class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                                    value="" name="image_url" id="image_url" placeholder="e.g., https://example.com/notification-banner.jpg" type="text" />
                                <small class="text-gray-500 text-xs mt-1 block">This image will appear in the notification. Must be publicly accessible.</small>
                            </div>

                            <!-- Click Action URL (Optional) -->
                            <div class="w-full mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="click_action_url">Click Action URL (Optional)</label>
                                <input
                                    class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                                    value="" name="click_action_url" id="click_action_url" placeholder="e.g., https://your-app.com/news" type="text" />
                                <small class="text-gray-500 text-xs mt-1 block">The URL to open when the user clicks the notification.</small>
                            </div>

                        </div>
                    </div>

                    <!-- The right column was largely empty in your original for coupon specifics,
                         leaving it here for layout consistency, but it has no new notification-specific fields. -->
                    <div class="lg:col-span-1 flex flex-col gap-6">
                        <!-- You could add helper text or other optional fields here if needed -->
                    </div>
                </div>
                <div class="w-[85%]">
                    <!-- Changed button text from "Save" to "Send Notification" -->
                    <button type="submit" class="bg-black border border-transparent rounded-md py-2 px-4 text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Send Notification
                    </button>
                </div>
            </form>
        </main>
    </div>
    <?php
    // Your footer include
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>
    <script>
        // JavaScript for dynamically changing the placeholder for the target identifier
        function updateTargetPlaceholder() {
            const sendType = document.querySelector('input[name="send_type"]:checked').value;
            const targetInput = document.getElementById('target_identifier');
            const targetLabel = document.getElementById('targetLabel');
            const smallText = targetInput.nextElementSibling; // The small text below the input

            if (sendType === 'token') {
                targetLabel.textContent = 'Target Device Token:';
                targetInput.placeholder = 'e.g., FCM token from browser console';
                smallText.textContent = 'Enter an FCM token from a specific device or browser.';
                targetInput.value = ''; // Clear previous value for new input
            } else { // topic
                targetLabel.textContent = 'Target Topic Name:';
                targetInput.placeholder = 'e.g., all_users or news_updates';
                smallText.textContent = "Notifications will be sent to all devices subscribed to this topic.";
                targetInput.value = 'all_users'; // Pre-fill with a common topic for convenience
            }
        }
        // Initialize on page load to set the correct placeholder
        document.addEventListener('DOMContentLoaded', updateTargetPlaceholder);
    </script>
</body>

</html>
