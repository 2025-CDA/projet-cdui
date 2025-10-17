import { useState } from "react";
import Label from "./Label"
import Button from "./Button"
import Input from "./Input"
import { LogIn , Mail, LockKeyhole, MoveRight } from "lucide-react";
import CheckBox from "./Checkbox";


function LoginForm({
    initialStep = 'login',


}) {

    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [remember, setRemember] = useState(false);
    const [provisionalPassword, setProvisionalPassword] = useState('');
    const [step, setStep] = useState(initialStep); // 'login' | 'error' | 'firstConnect' | 'forgotPassword'
    const [errorMsg, setErrorMsg] = useState('');


 // useEffect(() => { setStep(initialStep); }, [initialStep]);

  // Handler de soumission classique
  const handleSubmit = (e) => {
    e.preventDefault();
    // Appel API ici, gestion du résultat
    // Si erreur → setStep('error')
    // Si première connexion → setStep('firstConnect')

  };

  // Handler pour recup mdp oublié
  const handleForgot = (e) => {
    e.preventDefault();
    // Traitement ici
  };

  // Handlers pour chaque étape

  return (
    <div className="gap-y-5 p-10" >
      {step === 'login' || step === 'error' ? (
        <form onSubmit={handleSubmit} className="text-black">
            <div>
                <h3 className="font-semibold my-5">Connectez-vous</h3>
            </div>
            <div>
                <Input
                    id="email"
                    label="Votre email"
                    type="email"
                    placeholder="Entrez votre email"
                    value={email}
                    onChange={e => setEmail(e.target.value)}
                    required
                    error={step === 'error'}
                    icon={<Mail size={15} color={step === 'error' ? 'red' : 'grey'} />}
                    withCopy={false}
                    className={step === 'error' ? 'bg-[#ff5f5740] border-2 border-red-400 outline-red-400 placeholder-red-400 font-semibold' : ''}>
                </Input>
            </div>
            <div className='my-5'>
                <Input
                    id="password"
                    type="password"
                    label="Mot de passe"
                    placeholder="Entrez votre mot de passe"
                    value={password}
                    onChange={e => setPassword(e.target.value)}
                    required
                    error={step === 'error'}
                    icon={<LockKeyhole size={15} color={step === 'error' ? 'red' : 'grey'}/>}
                    withShowPassword
                    withCopy={false}
                    className={step === 'error' ? 'bg-[#ff5f5740] border-2 border-red-400 outline-red-400 placeholder-red-400 font-semibold  text-red-400' : ''}
                />
            </div>

            {step === 'error' && (
                <p className="text-red-400 text-sm mt-2 whitespace-pre-line font-semibold">
                    {errorMsg || 'Votre adresse email et/ou mot de passe sont incorrectes. \nVeuillez vérifier vos informations.'}
                </p>
            )}
          <div className="flex flex-row items-center justify-between mt-4">
                <div className = "font-semibold flex flex-row py">
                    <CheckBox label="Se souvenir de moi" checked={remember} onChange={e => setRemember(e.target.checked)} />
                </div>
                <div>
                    <a href="#"> <p className="text-blue-500 hover:underline flex justify-self-end text-sm" onClick={() => setStep('forgotPassword')}>Mot de passe oublié ?
                    </p></a>
                </div>
          </div>
          <Button color="blue" variant='solid' type="submit" className="mt-6 flex items-center gap-2 bg-primary" shape="rounded" >
            Se connecter <MoveRight />
          </Button>
        </form>
      ) : null}
      {step === 'firstConnect' && (
        <form /* handler ici */>
          <h3 className="font-semibold">Première Connexion</h3>
          <Input
            id="provisional-password"
            label="Mot de passe provisoire"
            type="password"
            placeholder="Mot de passe provisoire"
            value={password}
            onChange={e => setPassword(e.target.value)}
            required
            icon={<LockKeyhole />}
            withShowPassword
          />
          <p className="text-gray-600 text-xs">Entrez le mot de passe reçu par email afin de vous connecter</p>
          <Button color="blue" type="submit" className="mt-6 flex items-center gap-2" shape="rounded">
            Créer mon compte <MoveRight />
          </Button>
        </form>
      )}
      {step === 'forgotPassword' && (
        <form onSubmit={handleForgot}>
          <h3 className="font-bold text-primary-text pb-5">Mot de passe oublié</h3>
          <Input
            id="recover-email"
            label="Email"
            type="email"
            placeholder="votre@email.com"
            value={email}
            onChange={e => setEmail(e.target.value)}
            required={false}
            withCopy={false}
            className='h-9'
          />
          <p className="text-gray-600 text-xs">
            Entrez l'adresse mail associée à votre compte pour modifier <br /> votre mot de passe
          </p>
          <Button color="blue" variant='solid' type="submit" className="mt-2 pb-2 text-xs" shape="rounded">
            Récupérer mon compte <MoveRight size={10}/>
          </Button>
        </form>
      )}
    </div>
  );
}

export default LoginForm;
