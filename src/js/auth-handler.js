const { createClient } = supabase;

const supabaseClient = createClient(
  "https://scusdtwjlnncgcndmvmp.supabase.co",
  "sb_publishable_k1TkuvN6b4rdK8r4OuzH4Q_iAKCyYWu"
);

function showMessage(message, type) {
    const container = document.getElementById("message-container");
    container.innerHTML = '<p class="' + type + '">' + message + '</p>';
}

function clearMessage() {
    document.getElementById("message-container").innerHTML = '';
}

async function login() {
    clearMessage();
    
    const email = document.getElementById("username").value;
    const password = document.getElementById("pass").value;

    if (!email || !password) {
        showMessage("Please enter both email and password.", "error");
        return;
    }

    const { data, error } = await supabaseClient.auth.signInWithPassword({
        email: email,
        password: password,
    });

    if (error) {
        showMessage(error.message, "error");
    } else {
        window.location.href = "shopping.php";
    }
}

async function signup() {
    clearMessage();
    
    const email = document.getElementById("username").value;
    const password = document.getElementById("pass").value;

    if (!email || !password) {
        showMessage("Please enter both email and password.", "error");
        return;
    }

    if (password.length < 8) {
        showMessage("Password must be at least 8 characters.", "error");
        return;
    }

    const { data, error } = await supabaseClient.auth.signUp({
        email: email,
        password: password,
    });

    if (error) {
        showMessage(error.message, "error");
    } else if (data.user && !data.session) {
        showMessage("Check your email to confirm your account.", "success");
    } else {
        showMessage("Account created! You are now logged in.", "success");
    }
}

window.login = login;
window.signup = signup;
