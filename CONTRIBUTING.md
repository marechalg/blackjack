# Contributing to Wild West Saloon

Thanks for your interest in contributing to Wild West Saloon! We welcome contributions from the community. This guide will help you get started.

## How to Contribute

### 1. Reporting Bugs

Before creating a bug report, please check the [issue list](https://github.com/marechalg/blackjack/issues) to ensure the issue hasn't already been reported.

When filing a bug report, include:
- **Clear title** describing the issue
- **Detailed description** of the problem and expected behavior
- **Steps to reproduce** the issue
- **Screenshots or screen recordings** if applicable
- **Browser/environment information** (OS, browser version, etc.)

### 2. Suggesting Features

Feature requests are welcome! Please describe:
- **What problem does this solve?**
- **Proposed solution** with examples
- **Alternative solutions** you've considered

### 3. Code Contributions

#### Getting Started

1. **Fork** the repository
2. **Clone** your fork locally:
   ```bash
   git clone https://github.com/YOUR-USERNAME/blackjack.git
   cd blackjack
   ```
3. **Create a feature branch**:
   ```bash
   git checkout -b feature/your-feature-name
   ```
4. **Install dependencies**:
   ```bash
   npm install
   ```
5. **Make your changes** and test them thoroughly
6. **Commit** with clear messages:
   ```bash
   git commit -m "feat: add feature description"
   ```
7. **Push** to your branch:
   ```bash
   git push origin feature/your-feature-name
   ```
8. **Open a Pull Request** on the main repository

## Code Style Guidelines

- Use **ES6+** JavaScript syntax
- Follow **Prettier** for code formatting
- Use **ESLint** rules for code quality
- Write **meaningful variable names**
- Add **comments** for complex logic
- Keep functions **small and focused**

## Commit Message Conventions

Use the following format:
```
type(scope): subject

body

footer
```

**Types:** `feat`, `fix`, `docs`, `style`, `refactor`, `perf`, `test`, `chore`

**Examples:**
- `feat(game): add double down functionality`
- `fix(ui): correct card rendering on mobile`
- `docs(readme): update installation steps`

## Testing

- Test your changes locally before submitting a PR
- Include unit tests for new features
- Ensure all existing tests pass:
  ```bash
  npm test
  ```

## Pull Request Process

1. **Update** the README.md with any new features
2. **Link** related issues in your PR description
3. **Describe** what your PR does and why
4. **Reference** any relevant issues or PRs
5. Ensure your branch is **up to date** with the main branch
6. Be prepared to make **revisions** based on feedback

## Questions?

Feel free to open an issue with the label `question` or reach out to the maintainers.

---

**Happy coding! 🤠🎰**
