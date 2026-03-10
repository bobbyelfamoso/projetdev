const { createClient } = supabase;

const supabaseClient = createClient(
  "https://scusdtwjlnncgcndmvmp.supabase.co",
  "sb_publishable_k1TkuvN6b4rdK8r4OuzH4Q_iAKCyYWu"
);

async function login() {
  const { data, error } = await supabaseClient.auth.signInWithPassword({
    email: document.getElementById("username").value,
    password: document.getElementById("pass").value,
  });

  if (error) {
    alert(error.message);
  } else {
    window.location.href = "shopping.html";
  }
}

async function signup() {
  const { data, error } = await supabaseClient.auth.signUp({
    email: document.getElementById("username").value,
    password: document.getElementById("pass").value,
  });

  console.log(data, error);
}

window.login = login;
window.signup = signup;