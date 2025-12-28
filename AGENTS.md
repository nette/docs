# To My Agents!

It is my fervent wish that this file guide every AI coding agent working with code in this repository.

## Project Overview

This is the official documentation repository for the Nette PHP framework ecosystem (`github.com/nette/docs`). It holds the user manual for 33 packages, written in Texy markup and published at nette.org, doc.nette.org, latte.nette.org, tester.nette.org and tracy.nette.org.

Pages are authored in English and Czech. From those two sources they are translated into eight further languages: `de`, `es`, `fr`, `it`, `ja`, `pl`, `ru`, `tr`.

## CRITICAL: Language Version Rules

**All edits MUST go only into the `/cs/` and `/en/` versions, and always into both at once.**

Everything below follows from a single mechanism: the translation system maps content between languages **line by line**. Break that correspondence and the mapping silently produces wrong translations in every other mutation.

1. **Edit only `/cs/` and `/en/`** — never touch `de`, `es`, `fr`, `it`, `ja`, `pl`, `ru`, `tr`. Those are generated, and edits there would be overwritten.
2. **Edit both versions in the same change** — a change that lands in only one of the pair is an incomplete change.
3. **Keep perfect line alignment** — both files must end up with the same number of lines, and the same information must sit on the same line number. Line 14 of `application/en/presenters.texy` corresponds to line 14 of `application/cs/presenters.texy`.
4. **Keep the same file set** — `/cs/` and `/en/` must contain exactly the same `.texy` files. Adding a page means creating it in both.
5. **Verify before committing** — `wc -l package/en/file.texy package/cs/file.texy` must report identical counts.

Adding or removing a line therefore always means adding or removing it in both files simultaneously, blank lines included. If a sentence needs one extra line in Czech, the English version needs a matching line as well.

## Documentation Structure

Documentation is organized by package, language and article:

```
<package>/
├── en/              # English version
├── cs/              # Czech version
├── de/, es/, ...    # Generated language variants — do not edit
├── files/           # Shared images and assets
└── meta.json        # Package metadata (documented version, repo, composer name)
```

The `version` field in `meta.json` says which version of the package the pages describe. It is the baseline for `.{data-version}` markers, see [below](#texy-documentation-modifiers).

### Package Inventory (33 packages)

**Nette Framework** (https://doc.nette.org):
- `application/` - MVC framework, presenters, routing, components
- `assets/` - Asset management and Vite integration
- `bootstrap/` - Application initialization and configuration
- `caching/` - Caching mechanisms
- `command-line/` - Building CLI applications: switches, options, ANSI output
- `component-model/` - Component system and lifecycle
- `database/` - Database access layer, Explorer, transactions
- `dependency-injection/` - DI container, autowiring, services
- `forms/` - Form creation, validation, rendering
- `http/` - HTTP request/response, sessions, URLs
- `mail/` - Email sending
- `neon/` - NEON format parser
- `nette/` - Main documentation hub, glossary, installation
- `php-generator/` - PHP code generation
- `robot-loader/` - Automatic class loader
- `safe-stream/` - Safe stream handling
- `schema/` - Schema validation and generation
- `security/` - Authentication, authorization, passwords
- `tokenizer/` - String tokenization (library no longer developed)
- `utils/` - Arrays, strings, filesystem, validation, datetime

**Key projects from the Nette ecosystem:**
- `ai/` - Nette AI (subdomain https://ai.nette.org)
- `ai-access/` - AI Access, one PHP interface for OpenAI, Claude, Gemini, DeepSeek and Grok
- `latte/` - Templating engine v3.0+ with a `/cookbook/` subdirectory, the only package with a nested structure (subdomain https://latte.nette.org)
- `tester/` - Testing framework with assertions and TestCase (subdomain https://tester.nette.org)
- `tracy/` - Debugger, dumper, extensions (subdomain https://tracy.nette.org)

**Supporting** (subdomain https://doc.nette.org):
- `best-practices/` - Development patterns and recipes
- `contributing/` - Contribution guidelines and documentation standards
- `migrations/` - Version upgrades
- `quickstart/` - Getting started tutorial
- `tools/` - Developer tooling: Code Checker, Coding Standard, PHPStan rules, IDE support, X-ray
- `www/` - Website content, logo, license, packages (subdomain https://nette.org)

**Others** (not part of Nette, only hosted on a Nette subdomain):
- `texy/` - Texy markup language processor (https://texy.nette.org)
- `dibi/` - Dibi database abstraction layer (https://dibi.nette.org)

**Structure notes:**
- Every package has `@home.texy` (entry point). Most also have `@meta.texy` (metadata) and `@left-menu.texy` or `@menu.texy` (navigation).

**Branch structure:**
- `master` - Current documentation (latest versions)
- `doc-3.x` - Version 3.x documentation
- `doc-2.x` - Legacy 2.x documentation

## CRITICAL: Always Write Plain ASCII Quotes

**In `.texy` files, always type the plain ASCII `"` and `'`. Never type typographic
quotes directly**, in any language — not `„…"`, not `«…»`, not `“…”`.

Texy converts them to the correct typographic pair for the page's language during
rendering, driven by `TypographyModule::$locales` (17 languages: bg, cs, de, el, en,
es, fr, hu, it, ja, pl, pt, ro, ru, sl, tr, uk). The same ASCII source therefore
renders as `„text"` in German, `«text»` in Russian and `「text」` in Japanese.

```texy
Mit "Initialisierung der Umgebung" meinen wir …     ← correct, Texy handles it
Mit „Initialisierung der Umgebung" meinen wir …     ← wrong, and broken on top
```

Why this is a rule and not a preference:

- **Typing them by hand produces broken pairs.** The closing characters (U+201C,
  U+2018) are unreliable to produce, so what usually comes out is an opening `„`
  followed by an ASCII `"` — a mismatched pair that no tool flags. This really
  happened in `application/de/how-it-works.texy` and had to be repaired by script.
- **Hardcoded quotes ignore the language.** A `„…"` typed into the Russian mutation
  stays German-looking; Texy would have produced `«…»`.
- **It keeps the source diffable and greppable.** One byte per quote, no invisible
  code points to normalize later.

The same applies to code samples: keep whatever the English source uses, since inside
a code block Texy performs no typographic substitution at all.

**The one exception** is the Texy documentation itself, where typographic quotes are the
subject matter and must appear literally: `texy/{cs,en}/configuration.texy` (the list of
locales), `texy/{cs,en}/syntax.texy` and `texy/cs/@home.texy`. Do not ASCII-ize those
lines. When touching them, take the pairs from `TypographyModule::$locales` — writing
them by hand produces broken pairs like `„text"`, which is exactly what those lines
suffered from before. Note that plain ASCII is equally wrong there: Texy would re-typeset
it to the *page's* locale, so a sample meant to show English quotes would come out with
Czech ones on the Czech page. Everywhere else the ASCII rule holds without exception.

## Texy Documentation Modifiers

Use these modifiers when documenting API elements in `.texy` files:

**Methods** - use `[method]` modifier:
```texy
static fromBlank(int $width, int $height, ?ImageColor $color=null): Image .[method]
-----------------------------------------------------------------------------------
Creates a new true color image of the given dimensions. The default color is black.
```

**Prefer expressive array types over bare `array`.** In signatures, describe what an
array holds using phpDoc-style shapes that mirror the code's `@return`/`@param`:
- `getComponents(): IComponent[]` instead of `getComponents(): array`
- `getComponentTree(): list<IComponent>` (a numerically indexed list) instead of `: array`
- `array<string, int>` for keyed maps

Bare `array` is the least informative part of a signature. These phpDoc shapes are not
native PHP types, which is fine here: they only appear in documentation.

**Latte filters** - use `[filter]` modifier:
```texy
batch(int $length, mixed $item): array .[filter]
------------------------------------------------
Filter that simplifies outputting linear data in table form.
```

**New features** - use `{data-version:X.Y}` modifier with version number:
```texy
New great feature .{data-version:3.1.0}
---------------------------------------
Description of the feature.
```

**Only mark versions NEWER than the documented baseline.** The baseline is the version
in the package's `meta.json`. A `.{data-version}` marker is only meaningful for a feature
added *after* the baseline, so the reader knows they need a newer patch/minor.

**The baseline is the FLOOR of the documented version range, not the latest release.**
This is critical when `meta.json` is a whole series like `3.x`:
- `meta.json: 3.x` means the page serves readers on **any** 3.y — including old 3.0.
  So a reader on 3.0 genuinely needs to know a feature arrived in 3.3.1. Therefore
  **keep** every `.{data-version:3.y.z}` where `3.y.z > 3.0` — the floor is `3.0`, and
  markers above the floor are meaningful. (E.g. `Using with PSR-16 .{data-version:3.3.1}`
  on a `3.x` page is CORRECT and must stay.)
- `meta.json: 4.0` (a concrete version) has floor `4.0`. Then `.{data-version:4.0.0}` and
  any `.{data-version:3.x.x}` are redundant (`<= 4.0`) and should be removed; keep only
  markers for later releases (`4.0.6`, `4.1`, …).

Rules of thumb:
- Do **not** add `.{data-version:X.0}` on a page whose baseline floor is `X.0`.
- Do **not** keep markers `<=` the baseline floor (e.g. `3.1.0` on a page documenting `4.0`).
- When bumping `meta.json` to a new major (e.g. `3.x` → `4.0`), the floor jumps from `3.0`
  to `4.0`: **strip** all markers `<= 4.0`, keep only later releases.

**Deprecated items** - use `[deprecated]` modifier (without version number):
```texy
static rgb(int $red, int $green, int $blue, int $transparency=0): array .[method][deprecated]
---------------------------------------------------------------------------------------------
This function has been replaced by the `ImageColor` class.
```

**Combined modifiers** (e.g., new filter):
```texy
accept .[filter]{data-version:3.1.0}
------------------------------------
Filter used during migration from Latte 3.0 to confirm behavior change acceptance.
```

**Chaining multiple modifier groups** — append additional `{...}` blocks without a leading dot (only the first one has `.`):
```texy
Národní prostředí .{data-version:3.0.18}{toc: Locale}
-----------------------------------------------------
```

**`.{data-version:X.Y.Z}` placements that work:**
- After a heading text (before the underline) — marks the whole section.
- On a list item, after an inline element: `` - `ClassName` .{data-version:3.2.9} - description `` — marks the item.
- On its own line before a paragraph as a block modifier — marks that paragraph.
- At the end of a paragraph, after the sentence period — Texy renders it correctly as a
  `data-version` attribute of the paragraph (verified; there are existing precedents, e.g.
  `dependency-injection/en/factory.texy`, `forms/en/in-presenter.texy`, `templates.texy`).

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
=====================================
```

**API signature headings** — a heading that documents a method or filter with a full
signature plus a `.[method]` or `.[filter]` modifier anchors to just the **member name**,
not the whole signature. The parameter list, return type, the modifier itself, and any
trailing `.{data-version:…}` are all stripped. Link to it with `|#name`:
```texy
map(callable $transformer): iterable .[filter]{data-version:3.1.6}   →   [… |#map]
beforeRender(Latte\Runtime\Template $template): void .[method]       →   [… |#beforeRender]
```
The name keeps its original case (`#localDate`, `#beforeRender`), but links resolve
case-insensitively, so `|#localdate` works too. This special rule needs both the
parentheses and the `.[method]`/`.[filter]` modifier; a parenless heading like
`first .[filter]` falls back to the generic rule (strip from the first `.[` / `.{`),
which still yields `#first`.

**Czech / diacritic anchors** — Texy slugifies Czech headings by stripping diacritics and lowercasing (e.g. "Automatické opakování" → `#automaticke-opakovani`). When linking, you may also write the original heading text after `#` (including diacritics) and Texy resolves it correctly — both forms work:
```texy
[see |transactions#automaticke-opakovani]
[viz |transactions#Automatické opakování]
```

Custom anchors are useful when:
- The automatic anchor would be too long or unclear
- You want a stable anchor that won't change if you rename the heading
- You need to match an existing link from another page

## Documentation Guidelines

Follow Nette's documentation standards:
- Start with simple concepts, progress to advanced topics
- Test all code examples for accuracy
- Use clear, concise language
- Minimal use of highlighting and special formatting
- Adhere to Nette's coding standard in code examples

English is the primary language. Use DeepL Translator for translations, which will be reviewed by contributors.

## Czech Terminology Conventions

When writing Czech documentation, keep these technical terms in English (they are part of common Czech programming slang):
- `marker interface` (not "značkovací rozhraní")
- `deadlock`, `idle timeout`, `callback`

Translate domain terms that have established Czech equivalents:
- "serialization failure" → "serializační konflikt"
- "outermost transaction" → "vnější transakce" (not "nejvyšší")
- "transient error" → "přechodná chyba"

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

## Mandatory Self-Review After Every Change

**Every time you add or rewrite text in the documentation, you MUST afterwards critically
review that text and act on your own critique.** Writing the text is only the first step;
the change is not finished until you have reviewed it and incorporated the resulting
improvements.

This applies to **both original writing and translation**:

1. **Original text (new or rewritten)** – After writing, critically evaluate it against the
   Writing Style and Documentation Guidelines above: Is it clear and completely
   understandable? Technically accurate? Friendly but precise? Free of jargon and
   redundancy? Does it follow the ASCII quotes rule? Then rewrite to fix every weakness
   you found.
2. **Translations** – After translating a text, critically evaluate the **quality of the
   translation**: Does it faithfully convey the meaning of the source? Does it read naturally
   in the target language (not like a machine translation)? Is terminology consistent with the
   conventions above (e.g. Czech Terminology Conventions)? Then incorporate your findings and
   correct the translation.

Do not present a change as complete, and do not stop, until this review-and-fix pass has been
done. When the change is non-trivial, briefly summarize what the self-review found and what
you improved.

## Before Committing

1. Verify the `/cs/` and `/en/` pair has identical line counts.
2. Run the Nette Code Checker, which validates whitespace, encoding and BOM across the repository. It also runs in CI on every push and pull request:
   ```sh
   composer create-project nette/code-checker code-checker
   code-checker/code-checker
   ```
