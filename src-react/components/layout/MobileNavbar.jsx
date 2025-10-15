import { User, Folder, Bell, Lightbulb } from "lucide-react";
import Button from "../../ui/Button";

function MobileNavbar() {
    return (
        <nav className="flex bottom-0 h-5 w-full rounded-t-sm bg-primary justify-between px-4 py-2 gap-2">
            <Button icon={<User />}>Mon compte</Button>
            <Button icon={<Folder />}>Mes documents</Button>
            <Button icon={<User></User>}>Dashboard</Button>
            <Button icon={<Bell />}>Notification</Button>
            <Button icon={<Lightbulb />}>Aide</Button>
        </nav>
    );
}

export default MobileNavbar;
