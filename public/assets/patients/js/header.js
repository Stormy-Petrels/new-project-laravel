document.getElementById("profile-image").addEventListener("click", function() {
    var profileLinks = document.getElementById("profile-links");
    if (profileLinks.style.display === "none") {
        profileLinks.style.display = "block";
    } else {
        profileLinks.style.display = "none";
    }
});

function updateHeader() {
    // Ẩn phần SignIn và SignUp
    document.getElementById("sign-in-link").style.display = "none";
    document.getElementById("sign-up-link").style.display = "none";
    // Hiển thị tên người dùng
    // document.getElementById("profile-image").innerText = ;
    document.getElementById("profile-image").style.display = "inline"; 
    document.getElementById("logout-link").style.display = "inline"; 
}
updateHeader();
