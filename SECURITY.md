# Security Policy

## Supported Versions

Currently, only the latest version of Wild West Saloon receives security updates and bug fixes.

| Version | Supported |
|---------|:---------:|
| 1.x     |     ✅     |
| < 1.0   |     ❌     |

## Reporting a Vulnerability

We take security vulnerabilities seriously. If you discover a security vulnerability in Wild West Saloon, please report it responsibly.

**Do NOT** open a public issue for security vulnerabilities. Instead:

1. **Email Security Report:** Send a detailed description of the vulnerability to the maintainers via private communication
2. **Include Details:**
   - Description of the vulnerability
   - Steps to reproduce or proof of concept
   - Potential impact
   - Suggested fix (if applicable)
3. **Give Us Time:** Allow reasonable time for the team to respond and develop a fix before public disclosure
4. **Acknowledgment:** We will acknowledge receipt of your report and keep you updated on the fix

## Security Best Practices

When using Wild West Saloon:

- Keep your dependencies up to date
- Do not expose sensitive information in the codebase (API keys, tokens, etc.)
- Use environment variables for configuration
- Validate all user inputs
- Use HTTPS for all communications

## Known Security Limitations

- This is a game application and not intended for production use with sensitive data
- Client-side validation should always be supplemented with server-side validation
- Encryption and authentication should be implemented according to security best practices

## Dependencies

We regularly monitor our dependencies for known vulnerabilities using tools such as:
- npm audit
- Dependabot
- OWASP dependency check

## Contact

For security concerns or to report a vulnerability, please reach out to the maintainers directly through GitHub.

---

**Thank you for helping us keep Wild West Saloon secure! 🔐**
