import { LucideIcon } from "lucide-react";

interface ExperienceBoxProps {
  icon: LucideIcon;
  title: string;
  description: string;
}

const ExperienceBox = ({ icon: Icon, title, description }: ExperienceBoxProps) => {
  return (
    <div className="text-center p-6 group hover:scale-105 transition-transform duration-300">
      <div className="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gold/10 mb-4 group-hover:bg-gold/20 transition-colors">
        <Icon className="w-8 h-8 text-gold" />
      </div>
      <h3 className="text-xl font-serif text-background mb-3">{title}</h3>
      <p className="text-cream/80 text-sm leading-relaxed">{description}</p>
    </div>
  );
};

export default ExperienceBox;
