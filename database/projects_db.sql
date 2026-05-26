DROP DATABASE IF EXISTS projects_db;
CREATE DATABASE IF NOT EXISTS projects_db;
USE projects_db;

CREATE TABLE IF NOT EXISTS users_tbl ( 
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users_tbl (username, password) VALUES ('admin', '$2y$10$ashltEzuZkysdAoAdGqRPu.cehasqKapSpQ4fZ0suvjoMNekiIhCy');
 
CREATE TABLE IF NOT EXISTS projects_tbl (
    proj_id INT AUTO_INCREMENT PRIMARY KEY,
    proj_title VARCHAR(255) NOT NULL,
    proj_start_date DATE NOT NULL, 
    proj_end_date DATE NOT NULL,
    proj_budget DECIMAL(10, 2) NOT NULL,
    proj_description TEXT NOT NULL,
    proj_is_done BOOLEAN NOT NULL DEFAULT FALSE,
    proj_is_visible BOOLEAN NOT NULL DEFAULT TRUE,
    proj_type VARCHAR(255) NOT NULL
);

INSERT INTO projects_tbl (proj_title, proj_start_date, proj_end_date, proj_budget, proj_description, proj_is_done, proj_is_visible, proj_type) VALUES

-- Environmental Projects
('Coastal Mangrove Restoration Initiative', '2024-01-15', '2025-01-14', 450000.00,
'A large-scale reforestation effort targeting degraded coastal areas. The project involves planting over 50,000 mangrove seedlings across 12 barangays to prevent coastal erosion, improve biodiversity, and serve as carbon sinks for local communities.',
FALSE, TRUE, 'Environmental'),

('Zero-Waste Community Drive', '2024-03-01', '2024-09-30', 180000.00,
'A community-based solid waste management program promoting proper segregation, composting, and upcycling. Includes distribution of compost bins, conduct of eco-workshops, and partnerships with local junk shops for materials recovery.',
TRUE, TRUE, 'Environmental'),

-- Educational Projects
('Digital Literacy for Public School Teachers', '2024-06-01', '2024-11-30', 320000.00,
'A capability-building program equipping 500 public school teachers with foundational and advanced digital skills. Covers tools for online instruction, classroom management platforms, and basic cybersecurity awareness to support 21st-century teaching.',
TRUE, TRUE, 'Educational'),

('Scholarship and Mentorship Program for Out-of-School Youth', '2025-01-01', '2026-12-31', 750000.00,
'A two-year program providing financial assistance, vocational training, and one-on-one mentoring for out-of-school youth aged 15–24. Aims to reintegrate 200 beneficiaries into formal education or skills-based livelihood tracks.',
FALSE, TRUE, 'Educational'),

-- Health Projects
('Mobile Maternal Health Clinic Expansion', '2024-04-01', '2025-03-31', 600000.00,
'Deployment of two additional mobile health units to remote barangays to deliver prenatal checkups, iron supplementation, and birth planning consultations. Targets a 30% reduction in maternal mortality risk in underserved areas within one year.',
FALSE, TRUE, 'Health'),

('Mental Health Awareness and Counseling Outreach', '2024-07-15', '2024-12-31', 210000.00,
'A community outreach program providing free psychological first aid, stress management seminars, and referral services for individuals experiencing mental health challenges. Partnered with licensed counselors and local government health offices.',
TRUE, TRUE, 'Health');