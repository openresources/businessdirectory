<?php
namespace App\Common;

class ServicesList
{
    const SERVICES = [
        ["name" => "Architecture", "description" => ""],
        ["name" => "Assisted Living Services", "description" => ""],
        ["name" => "Banking", "description" => ""],
        ["name" => "Building Repairs & Construction", "description" => ""],
        ["name" => "Childcare Services", "description" => ""],
        ["name" => "Computer Hardware", "description" => ""],
        ["name" => "Computer Programming", "description" => ""],
        ["name" => "Consulting - Private Sector", "description" => ""],
        ["name" => "Consulting - Public Sector", "description" => ""],
        ["name" => "Consumer & Small Business Services", "description" => ""],
        ["name" => "Daycare Services", "description" => ""],
        ["name" => "Design", "description" => ""],
        ["name" => "Development Consultancy", "description" => ""],
        ["name" => "Education Provider (Primary - Secondary - Post Secondary)", "description" => ""],
        ["name" => "Employment Services", "description" => ""],
        ["name" => "Energy", "description" => ""],
        ["name" => "Financial Services", "description" => ""],
        ["name" => "Food Systems", "description" => ""],
        ["name" => "Healthcare Services", "description" => ""],
        ["name" => "Housing & Real Estate Services", "description" => ""],
        ["name" => "ICT", "description" => ""],
        ["name" => "Legal Services", "description" => ""],
        ["name" => "Medical / Dental Services", "description" => ""],
        ["name" => "Merchandising", "description" => ""],
        ["name" => "NGO / Non-Profit Services", "description" => ""],
        ["name" => "Nursing Homes", "description" => ""],
        ["name" => "Public Sector (Civil Service) Operators", "description" => ""],
        ["name" => "Religious Ministries", "description" => ""],
        ["name" => "Security Services / Law Enforcement", "description" => ""],
        ["name" => "Substance Abuse Services", "description" => ""],
        ["name" => "Sustainability", "description" => ""],
        ["name" => "Tailoring", "description" => ""],
        ["name" => "Transportation & Logistics", "description" => ""],
        ["name" => "Uniformed Public Service (Military)", "description" => ""],
        ["name" => "Violence Prevention", "description" => ""],
        ["name" => "Women's Shelter", "description" => ""],
    ];

    public static function services()
    {
        return collect(self::SERVICES);
    }
}
