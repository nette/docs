# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is the official documentation repository for the Nette PHP framework ecosystem. It contains technical documentation for 31 packages across 16+ languages, written in Texy markup format and published at nette.org, doc.nette.org, latte.nette.org, tester.nette.org, and tracy.nette.org.

## CRITICAL: Language Version Rules

**⚠️ MOST IMPORTANT: All edits and changes MUST ONLY be made to `/cs/` and `/en/` language versions!**

### Strict Synchronization Requirements

1. **Edit only `/cs/` and `/en/` versions** - Never directly edit other language variants (de, fr, es, ru, etc.)
2. **Perfect line alignment** - `/cs/` and `/en/` must have identical line counts and structure
   - Same information must be on the same line number in both versions
   - Example: Line 14 in `application/en/presenters.texy` corresponds to line 14 in `application/cs/presenters.texy`
   - Both files must have exactly the same number of lines (e.g., both have 510 lines)
3. **Same file sets** - `/cs/` and `/en/` must contain exactly the same `.texy` files
4. **Automatic translation** - Other language variants (de, fr, es, etc.) are translated automatically from `/en/` or `/cs/` using DeepL
5. **Verification** - Use `php verifyLineAlignment.php` to check line synchronization across language versions

### Why This Matters

The translation system relies on line-by-line correspondence between `/cs/` and `/en/`. When these versions are perfectly aligned:
- Automated translation tools can map content accurately
- Changes propagate correctly to all 16+ language variants
- Documentation consistency is maintained across all languages

**Before any edit:**
- Check that both `/cs/` and `/en/` files exist
- Ensure line counts match: `wc -l package/en/file.texy package/cs/file.texy`
- Make parallel changes to maintain synchronization

## Documentation Structure

Documentation is organized by package, language, and article:

```
<package>/
├── en/              # English version (primary language)
├── cs/              # Czech version
├── de/, fr/, ...    # Other language variants
├── files/           # Shared images and assets
└── meta.json        # Package metadata (version, repo, composer name)
```

### Complete Package Inventory (31 packages, 233 files in /en)

**Nette Framework:**  (subdomain https://doc.nette.org)
- `application/` - MVC framework, presenters, routing, components
- `assets/` - Asset management and Vite integration
- `bootstrap/` - Application initialization and configuration
- `caching/` - Caching mechanisms
- `component-model/` - Component system and lifecycle
- `database/` - Database access layer, Explorer, transactions (subdomain https://doc.nette.org)
- `dependency-injection/` - DI container, autowiring, services
- `forms/` - Form creation, validation, rendering
- `http/` - HTTP request/response, sessions, URLs
- `mail/` - Email sending
- `neon/` - NEON format parser
- `nette/` - Main documentation hub, glossary, installation
- `php-generator/` - PHP code generation
- `robot-loader/` - Automatic class loader
- `safe-stream/` - Safe stream handling
- `security/` - Authentication, authorization, passwords
- `schema/` - Schema validation and generation
- `utils/` - Arrays, strings, filesystem, validation, datetime

**Key Projects from Nette Ecosystem:**
- `ai/` - Nette AI (subdomain https://ai.nette.org)
- `latte/` - Templating engine v3.0+ with `/cookbook/` subdirectory (only package with nested structure) (subdomain https://latte.nette.org)
- `tracy/` - Debugger, dumper, extensions (subdomain https://tracy.nette.org)
- `tester/` - Testing framework with assertions and TestCase (subdomain https://tester.nette.org)

**Supporting:** (subdomain https://doc.nette.org)
- `best-practices/` - Development patterns and recipes
- `code-checker/` - Code quality checker tool
- `contributing/` - Contribution guidelines and documentation standards
- `migrations/` - version upgrades
- `quickstart/` - Getting started tutorial
- `www/` - Website content, logo, license, packages (subdomain https://nette.org)

**Others:**
- `texy/` - Texy markup language processor (The project is not directly part of Nette, it is only located on the subdomain https://texy.nette.org)
- `dibi/` - Dibi database abstraction layer (The project is not directly part of Nette, it is only located on the subdomain https://dibi.nette.org)

**Structure notes:**
- All packages include `@home.texy` (entry point) and `@meta.texy` (metadata)
- Most packages include `@left-menu.texy` or `@menu.texy` for navigation

**Branch structure:**
- `master` - Current documentation (latest versions)
- `doc-3.x` - Version 3.x documentation
- `doc-2.x` - Legacy 2.x documentation

## File Format

Documentation uses **Texy markup** (`.texy` files), a custom markup language for structured content. Files contain headings, paragraphs, and code blocks parsed by the utilities in the root directory.

## Texy Documentation Modifiers

Use these modifiers when documenting API elements in `.texy` files:

**Methods** - use `[method]` modifier:
```texy
static fromBlank(int $width, int $height, ?ImageColor $color=null): Image .[method]
-----------------------------------------------------------------------------------
Creates a new true color image of the given dimensions. The default color is black.
```

**Latte filters** - use `[filter]` modifier:
```texy
batch(int $length, mixed $item): array .[filter]
------------------------------------------------
Filter that simplifies outputting linear data in table form.
```

**New features** - use `{data-version:X.Y}` modifier with version number:
```texy
New great feature .{data-version:3.1}
-------------------------------------
Description of the feature.
```

**Deprecated items** - use `[deprecated]` modifier (without version number):
```texy
static rgb(int $red, int $green, int $blue, int $transparency=0): array .[method][deprecated]
---------------------------------------------------------------------------------------------
This function has been replaced by the `ImageColor` class.
```

**Combined modifiers** (e.g., new filter):
```texy
accept .[filter]{data-version:3.1}
----------------------------------
Filter used during migration from Latte 3.0 to confirm behavior change acceptance.
```

## Headings and Anchors

All headings automatically generate URL anchors based on their text. This allows linking directly to any section.

**Automatic anchors:**
- Heading "Installing Claude Code" → anchor `#installing-claude-code`
- Heading "What's Next" → anchor `#what-s-next`

**Linking to sections:**
```texy
See [installation guide |getting-started#installing-claude-code] for details.
```

**Custom anchors** - use `.{#anchor-name}` modifier when you need a specific anchor:
```texy
Installing Claude Code .{#Installing}
===============
```

This is useful when:
- The automatic anchor would be too long or unclear
- You want a stable anchor that won't change if you rename the heading
- You need to match an existing link from another page

## Documentation Guidelines

Follow Nette's documentation standards:
- Start with simple concepts, progress to advanced topics
- Test all code examples for accuracy
- Use clear, concise language
- Minimal use of highlighting and special formatting
- Adhere to [Coding Standard] in code examples

English is the primary language. Use DeepL Translator for translations, which will be reviewed by contributors.

## Writing Style

Nette documentation is known for its **friendly, approachable language** that remains **technically precise**. This style is a core part of the Nette brand and must be maintained across all documentation.

### Key Principles

1. **Friendly and approachable** – Write as if explaining to a colleague, not writing a technical manual
2. **Completely understandable** – No assumed knowledge; explain every concept when first introduced
3. **Technically accurate** – Use precise terminology and correct examples
4. **Only brief where clarity allows** – Never sacrifice understanding for brevity

### Good vs Bad Examples

**Good example:**
> MCP Inspector allows AI to look directly at your application – to see what services you have registered, what tables are in your database, and what routes lead where. Without this, the AI would have to guess based on patterns it learned during training.

**Bad example:**
> MCP Inspector provides runtime introspection via DI container, database schema, and router inspection tools.

The good example explains what the tool does and why it matters. The bad example is technically correct but assumes the reader already understands the concepts.

### Tone Guidelines

- Use "you" and "your" to address the reader directly
- Use "we" when walking through steps together ("Let's start by...")
- Explain the "why" not just the "what"
- Use concrete examples instead of abstract descriptions
- Anticipate questions and answer them proactively
- Avoid jargon; when technical terms are necessary, explain them

### Structure Guidelines

- Start each page with a `.[perex]` or `<div class=perex>` (for multiple paragraphs) summary that explains what the reader will learn
- Use clear, descriptive headings that tell the reader what each section contains
- Break complex topics into digestible sections
- Use code examples liberally – they're often clearer than prose
- End sections with "What's Next" links when appropriate

## Common Tasks

**Adding a new documentation page:**
1. **CRITICAL:** Create `.texy` file in BOTH `/en/` AND `/cs/` directories
2. Ensure both files have the same structure and line count
3. Follow existing structure (headings, code blocks, paragraphs)
4. Add code examples with proper syntax highlighting
5. Verify line alignment: `wc -l package/en/file.texy package/cs/file.texy`
8. Run code-checker before committing

**Editing existing documentation:**
1. **CRITICAL:** Edit ONLY `/cs/` and `/en/` versions - never edit de, fr, es, ru, etc.
2. Make parallel changes to both `/cs/` and `/en/` files
3. Maintain identical line counts - add/remove lines in both files simultaneously
4. Keep the same information on the same line numbers
6. Other language variants will be updated automatically by the translation system

### Example: Correct Way to Edit Documentation

**❌ WRONG - Editing only one language:**
```bash
# Don't do this!
vim application/en/presenters.texy
# Edit only English version
# Save and commit
```

**✅ CORRECT - Editing both synchronized versions:**
```bash
# Check current line counts
wc -l application/en/presenters.texy application/cs/presenters.texy
# Output: 510 application/en/presenters.texy
#         510 application/cs/presenters.texy

# Edit both files in parallel
vim application/en/presenters.texy application/cs/presenters.texy

# After editing, verify line counts still match
wc -l application/en/presenters.texy application/cs/presenters.texy
# Output should still be: 510 510
```

**Example of line-by-line correspondence:**
```
application/en/presenters.texy:
  Line 1: Presenters
  Line 14: [We already know...
  Line 510: (last line)

application/cs/presenters.texy:
  Line 1: Presentery
  Line 14: [Už víme...
  Line 510: (last line)
```

Both files have identical structure, same number of lines, same information on corresponding lines - only the language differs.
