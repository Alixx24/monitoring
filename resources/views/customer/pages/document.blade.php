@extends('customer.layouts.master')
@section('title', 'Dashboard')

@section('content')

    <style>
        body {
            font-family: Vazir, Tahoma, sans-serif;
        }

        /* سایدبار دسکتاپ */
        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 200px;
            background-color: #f9f9f9;
            border-right: 1px solid #ccc;
            padding: 20px 15px;
            overflow-y: auto;
            z-index: 1030;
        }

        /* فاصله محتوا در دسکتاپ */
        #main-content {
            margin-left: 230px;
            padding: 20px;
        }

        /* دکمه همبرگر بالا سمت چپ، فقط موبایل */
        #menuBtn {
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1100;
            font-size: 24px;
            background: #0d6efd;
            border: none;
            color: white;
            border-radius: 6px;
            padding: 6px 12px;
            cursor: pointer;
            display: none;
        }

        /* لینک های داخل منو */
        #sidebar a,
        .offcanvas-body a {
            display: block;
            padding: 12px 15px;
            margin-bottom: 12px;
            color: #333;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.25s ease, color 0.25s ease;
        }

        #sidebar a:hover,
        .offcanvas-body a:hover {
            background-color: #0d6efd;
            color: white;
            text-decoration: none;
        }

        /* لینک فعال */
        #sidebar a.active,
        .offcanvas-body a.active {
            background-color: #0d6efd;
            color: white;
            font-weight: 700;
        }

        /* نمایش دکمه منو و مخفی کردن سایدبار روی موبایل */
        @media (max-width: 767.98px) {
            #sidebar {
                display: none;
            }

            #menuBtn {
                display: block;
            }

            #main-content {
                margin-left: 0;
                padding: 20px 15px;
            }
        }
    </style>
    </head>
    <div>
        <!-- دکمه همبرگر -->
        <button id="menuBtn" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar"
            aria-controls="mobileSidebar">
            ☰ منو
        </button>

        <!-- سایدبار دسکتاپ -->
        <nav id="sidebar" class="d-none d-md-block" aria-label="منوی اصلی">
            <h4 class="mb-4">منو دسترسی</h4>
            <a href="#document" class="nav-link">Monitoring & Alerting</a>
            <a href="#contactus" class="nav-link">How to Get Started</a>
            <a href="#aboutus" class="nav-link">How to Get Started</a>
        </nav>

        <!-- سایدبار موبایل (offcanvas) -->
        <div class="offcanvas offcanvas-start w-100" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="mobileSidebarLabel">منو دسترسی</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="بستن"></button>
            </div>
            <div class="offcanvas-body d-flex flex-column">
                <a href="#document" data-bs-dismiss="offcanvas" class="nav-link">Monitoring & Alerting</a>
                <a href="#contactus" data-bs-dismiss="offcanvas" class="nav-link">How to Get Started</a>
                <a href="#aboutus" data-bs-dismiss="offcanvas" class="nav-link">How to Get Started</a>
            </div>
        </div>


        <main id="main-content" class="bg-light me-4 mb-3 rounded">
            <section id="document" tabindex="0" style="padding-top: 80px; margin-top: -80px;">
                <h2>📡 Monitoring & Alerting</h2>

                <p>
                    When you <strong>register a link</strong> in our system, it will be automatically checked at intervals
                    you choose (e.g., every <strong>5, 10, or 15 minutes</strong>). The goal of this monitoring is to ensure
                    your link remains <strong>accessible</strong> and <strong>functions properly</strong> at all times.
                </p>

                <h3>Monitoring and Alert Process</h3>
                <ul>
                    <li><strong>Registering Your Link:</strong> First, you add your website or service link to our system.
                    </li>
                    <li><strong>Choosing the Check Interval:</strong> Select how often you want the link to be checked.</li>
                    <li><strong>Checking the Link:</strong> At each interval, the system sends a request to your link and
                        evaluates the server’s response status.</li>
                    <li><strong>Detecting Issues:</strong> If the server does not respond, responds too slowly, or returns
                        errors like 404 or 500, the system detects a problem.</li>
                    <li><strong>Sending Notifications:</strong> An immediate email alert containing detailed information
                        about the issue is sent to your registered email.</li>
                    <li><strong>Recovery Check:</strong> Once the issue is resolved and the link is back online, a recovery
                        email is sent to notify you.</li>
                </ul>

                <h3>What Errors Are Detected?</h3>
                <ul>
                    <li><strong>Complete Link Downtime:</strong> Link is unreachable (timeout or no response).</li>
                    <li><strong>HTTP Errors:</strong> Such as 404 (Not Found), 500 (Internal Server Error), and other common
                        HTTP error codes.</li>
                    <li><strong>Slow Response:</strong> The server response time exceeds a preset limit.</li>
                </ul>

                <h3>Customizing Check Intervals</h3>
                <p>You can choose how frequently each link is checked:</p>
                <ul>
                    <li>Every 5 minutes</li>
                    <li>Every 10 minutes</li>
                    <li>Every 15 minutes</li>
                </ul>
                <p>This flexibility allows you to tailor monitoring sensitivity based on the criticality of each link.</p>

                <h3>Important Notes About Notifications</h3>
                <ul>
                    <li>Currently, <strong>all alerts are sent via email only.</strong></li>
                    <li>Email notifications might end up in your <strong>Spam folder</strong>; please whitelist our email
                        address to ensure you receive all alerts.</li>
                    <li><strong>Additional notification channels are coming soon.</strong></li>
                </ul>
            </section>
            <br>
            <section id="contactus" tabindex="0" style="padding-top: 80px; margin-top: -80px;">
                <h2>💰 Pricing Model and Subscription</h2>

                <h3>Is this service free?</h3>
                <p><strong>Yes!</strong> All features of our monitoring service are <strong>completely free</strong> with
                    <strong>no usage limits</strong>.
                </p>

                <h3>Are there any limitations?</h3>
                <ul>
                    <li><strong>Number of monitored links:</strong> Unlimited</li>
                    <li><strong>Number of checks:</strong> Unlimited</li>
                    <li><strong>Alert delivery:</strong> Unlimited and free</li>
                    <li><strong>No credit card or payment information required.</strong></li>
                </ul>

                <h3>Our Philosophy</h3>
                <p>
                    We believe uptime monitoring should be <strong>accessible to everyone</strong>—whether you’re running a
                    small personal project or a large business.
                </p>

                <h3>Security & Privacy</h3>
                <ul>
                    <li>Your data is kept <strong>strictly confidential</strong>.</li>
                    <li>We only use your email address to send alerts and do <strong>not collect additional
                            information</strong>.</li>
                </ul>

                <h2>📬 Notification Channels</h2>

                <h3>Current and Future Notification Channels</h3>

                <h4>Current Channel</h4>
                <p>
                    <strong>Email:</strong> All alerts are currently sent to the email address you provide when registering
                    your link.
                </p>

                <h4>Channels Under Development</h4>
                <p>We are actively working on adding new notification methods:</p>
                <ul>
                    <li>📱 SMS (Text Messages)</li>
                    <li>💬 Telegram</li>
                    <li>🟢 WhatsApp</li>
                </ul>

                <h3>Features of New Channels</h3>
                <ul>
                    <li>Ability to choose <strong>one or more preferred alert channels</strong></li>
                    <li><strong>Advanced settings</strong> for each link individually</li>
                    <li><strong>Priority settings</strong> for different types of alerts</li>
                </ul>
            </section>
            <br>
            <section id="aboutus" tabindex="0" style="padding-top: 80px; margin-top: -80px;">
                <h2>🔧 How to Get Started</h2>
                <h2> Step-by-Step Getting Started Guide</h2>

                <ol>
                    <li><strong>Sign up or log in</strong> to your account.</li>
                    <li><strong>Register your link</strong> for monitoring. <em>Make sure to include the full URL (including
                            http/https).</em></li>
                    <li><strong>Select the monitoring interval.</strong></li>
                    <li><strong>Enter the email address</strong> for alerts.</li>
                    <li><strong>Activate and save your settings.</strong></li>
                    <li><strong>Manage your links anytime</strong> in your user panel.</li>
                </ol>

                <h3>Additional Tips</h3>
                <ul>
                    <li>Check your <strong>Spam folder</strong> if you don’t receive alerts.</li>
                    <li>Add our email address to your <strong>whitelist</strong> to avoid missing notifications.</li>
                    <li>Contact <strong>support</strong> if you need assistance.</li>
                </ul>

                <h2>❓ Frequently Asked Questions (FAQ)</h2>

                <h3>Common Questions</h3>
                <ol>
                    <li><strong>Is there a limit on the number of links I can monitor?</strong><br>No, you can add as many
                        links as you want.</li>
                    <li><strong>Can I change the check interval later?</strong><br>Yes, you can modify the interval from
                        your user panel anytime.</li>
                    <li><strong>What types of errors trigger alerts?</strong><br>Complete downtime, HTTP errors (404, 500,
                        etc.), and slow server responses.</li>
                    <li><strong>What should I do if I don’t receive alert emails?</strong><br>Check your Spam folder and
                        whitelist our email address.</li>
                    <li><strong>Can I receive alerts via SMS or Telegram now?</strong><br>Currently, only email alerts are
                        active. SMS, Telegram, and WhatsApp alerts will be available soon.</li>
                    <li><strong>Is my information secure?</strong><br>Yes, we respect your privacy and only use your email
                        for sending alerts.</li>
                    <li><strong>Do I need to provide payment details?</strong><br>No, this service is completely free with
                        no payment or credit card required.</li>
                </ol>

                <h2>🔍 Advanced Features (Coming Soon)</h2>

                <h3>Upcoming Advanced Features</h3>
                <ul>
                    <li><strong>Detailed Reports:</strong> Periodic status reports and uptime charts.</li>
                    <li><strong>Link Grouping:</strong> Organize and manage links by project or category.</li>
                    <li><strong>Multi-Channel Alerts:</strong> Enable multiple notification channels simultaneously.</li>
                    <li><strong>Custom Alert Rules:</strong> Set complex conditions for alerts based on error types and
                        severity.</li>
                </ul>

                <h2>🛠 Support & Contact</h2>

                <p>
                    If you have any questions, issues, or need help, you can reach our support team via email at
                    <a href="mailto:support@example.com">support@example.com</a> or through the contact form on our website.
                    We are committed to providing fast and helpful assistance.
                </p>

            </section>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // اسکریپت برای فعال کردن لینک منو بر اساس اسکرول
            document.addEventListener('DOMContentLoaded', () => {
                const sections = document.querySelectorAll('main section');
                const navLinks = document.querySelectorAll('#sidebar a, .offcanvas-body a');

                function activateLink() {
                    let scrollPos = window.scrollY || window.pageYOffset;

                    sections.forEach((section) => {
                        const top = section.offsetTop - 90; // 90 برای جبران ارتفاع ثابت و فاصله بالا
                        const bottom = top + section.offsetHeight;

                        if (scrollPos >= top && scrollPos < bottom) {
                            navLinks.forEach(link => {
                                link.classList.remove('active');
                                if (link.getAttribute('href') === '#' + section.id) {
                                    link.classList.add('active');
                                }
                            });
                        }
                    });
                }

                window.addEventListener('scroll', activateLink);
                activateLink(); // اجرا در بارگذاری صفحه
            });
        </script>

    </div>
@endsection
