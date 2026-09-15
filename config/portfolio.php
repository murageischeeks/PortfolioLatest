<?php

return [
    'hero' => [
        'greeting' => 'Hi, my name is',
        'name' => 'Wairimu Max Murage.',
        'subtitle' => 'Software Developer | Full-Stack & Healthcare IT Systems.',
        'description' => "I am a Bachelor of Science in Information Technology graduate with hands-on software development experience building secure, full-stack web systems. I specialize in Laravel, secure data pipelines, and healthcare IT solutions.",
        'email' => 'wairimumax1@gmail.com',
        'phone' => '+254703115896',
    ],

    'about' => [
        'paragraphs' => [
            "I am a Bachelor of Science in Information Technology graduate from <strong>Jomo Kenyatta University of Agriculture and Technology (JKUAT)</strong> with hands-on software development experience building secure, full-stack web systems.",
            "I designed and built a Laravel-based Hospital Management and Patient Triage System featuring custom security middleware, automated clinical validation logic, and audit-grade traceability — work that sharpened my thinking around data integrity, input validation, and system trust at the architecture level.",
            "My technical foundation spans Java, TypeScript, JavaScript, PHP, Python, and core web technologies (HTML, CSS), and I am comfortable working across the stack: backend logic, securing data pipelines against injection and scripting attacks, and shaping usable front-end interfaces.",
            "A three-month ICT attachment in a national referral hospital (KUTRRH) further strengthened my understanding of system reliability, end-user support, and working within regulated, high-responsibility environments. I bring strong documentation habits, clear communication, and a security-conscious approach to development."
        ],
        'image' => 'images/profile.jpg',
    ],

    'skills' => [
        [
            'category' => 'Programming & Web Development',
            'items' => [
                'Java, TypeScript & JavaScript',
                'PHP & Python',
                'Laravel (PHP MVC Framework)',
                'RESTful Application Logic',
                'Middleware & Pipeline Design',
                'HTML5 & CSS3 Responsive UI',
            ],
        ],
        [
            'category' => 'Application Security & Data',
            'items' => [
                'SQL Injection Prevention',
                'Cross-Site Scripting (XSS) Mitigation',
                'Regex Pattern-Based Input Scanning',
                'Audit Logging & Traceability Design',
                'Relational Data Modeling & Validation',
            ],
        ],
        [
            'category' => 'IT Systems & Networking',
            'items' => [
                'LAN/WAN Fundamentals & Security',
                'Routers, Switches & Hardware Support',
                'Computer Maintenance & Troubleshooting',
                'HCI Principles & Usability Testing',
                'Git, VS Code & Linux Environments',
            ],
        ],
        [
            'category' => 'Soft Skills & Methods',
            'items' => [
                'Problem Solving & Logic Validation',
                'Communication & Cross-Team Collaboration',
                'Time Management & Deadline Prioritization',
                'Adaptability & Independent Learning',
            ],
        ],
    ],

    'experience' => [
        [
            'role' => 'IT Attachment / ICT Support Intern',
            'company' => 'Kenyatta University Teaching, Referral & Research Hospital (KUTRRH) — Nairobi, Kenya',
            'date' => '3 Months Attachment',
            'bullets' => [
                'Supported ICT operations within a high-demand healthcare environment, contributing to the stability and availability of critical systems used across multiple hospital departments.',
                'Assisted in troubleshooting hardware, software, and basic network connectivity issues, helping maintain ~80–90% system uptime for end users during daily operations.',
                'Supported installation, configuration, and maintenance of computers, printers, and peripheral devices, reducing device-related downtime and improving staff productivity.',
                'Assisted in user account management, system access control, and basic data handling tasks, ensuring operational continuity and adherence to access policies.',
                'Gained practical exposure to healthcare IT workflows, reliability requirements, and data security practices in a regulated environment — directly informing the security and validation logic in the Patient Triage System project.',
            ],
        ],
        [
            'role' => 'Cloud and Systems Trainee',
            'company' => 'Huawei ICT Academy — Nairobi, Kenya',
            'date' => 'May 2024 - August 2024',
            'bullets' => [
                'Participated in structured ICT training focused on networking fundamentals, cloud computing, and IT system implementation.',
                'Strengthened understanding of networking principles, cloud computing concepts, and system deployment basics.',
                'Gained hands-on exposure to IT infrastructure setup and system configuration practices.',
                'Completed Huawei Networking Technologies training and certification.',
            ],
        ],
    ],

    'projects' => [
        [
            'overline' => 'Backend Architecture & Clinical Interoperability',
            'title' => 'Secure Hospital Management & Middleware System',
            'challenge' => 'A county referral hospital required seamless interoperability between patient-generated data and the central EMR (KenyaEMR/OpenMRS), without exposing the core database to external vulnerabilities.',
            'approach' => 'Designed a multi-stage Laravel middleware pipeline focusing on zero-trust architecture. Implemented rigid payload validation, RBAC authentication, and full audit logging at every step of the data transformation process.',
            'tech' => ['Laravel 11', 'PHP', 'PostgreSQL', 'REST APIs', 'Security Middleware'],
            'image' => 'images/middleware.jpg',
            'reverse' => false,
        ],
        [
            'overline' => 'Security & Data Validation Engine',
            'title' => 'Patient Triage & Validation Engine',
            'challenge' => 'Clinicians were overwhelmed with unstructured, potentially contradictory, and unverified data submissions from external portals, creating both operational inefficiency and security risks (SQLi/XSS).',
            'approach' => 'Engineered an Active Security Scanner utilizing deep recursive text mining via Regex to block injection attacks. Paired this with an automated clinical validation engine that mathematically scores urgency and flags contradictory logic before hitting the database.',
            'tech' => ['Laravel MVC', 'Regex Firewalls', 'Input Scanning', 'Audit Logging'],
            'image' => 'images/triage.png',
            'reverse' => true,
        ],
    ],

    'education' => [
        [
            'degree' => 'Bachelor of Science in Information Technology',
            'institution' => 'Jomo Kenyatta University of Agriculture and Technology (JKUAT) — Nairobi, Kenya',
            'date' => 'Graduated: August 14, 2026',
            'coursework' => 'Software Development, Computer Networks, Database Systems, Systems Analysis & Design',
        ],
        [
            'degree' => 'Kenya Certificate of Secondary Education (KCSE)',
            'institution' => 'Kanjuri High School | Kenya',
            'date' => '2022',
            'coursework' => 'Grade: B+ (Strong performance in Mathematics and Sciences)',
        ],
        [
            'degree' => 'Kenya Certificate of Primary Education (KCPE)',
            'institution' => 'Nyamachaki Primary School | Kenya',
            'date' => '2010 - 2018',
            'coursework' => 'Score: 327',
        ],
    ],

    'certifications' => [
        [
            'title' => 'Cisco Networking Certification',
            'issuer' => 'Cisco Networking Academy',
            'date' => 'Certified',
        ],
        [
            'title' => 'CyberShujaa Program Certification',
            'issuer' => 'Digital Skills & Cybersecurity Training',
            'date' => 'Certified',
        ],
        [
            'title' => 'AWS Generative AI Certificate',
            'issuer' => 'Large Language Models & Generative AI Fundamentals',
            'date' => 'Certified',
        ],
        [
            'title' => 'Huawei Networking Technologies Certification',
            'issuer' => 'Huawei ICT Academy',
            'date' => 'August 2024',
        ],
    ],
];
