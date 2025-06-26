// @ts-check
import { test, expect } from '@playwright/test';

test('Registration', async ({ page }) => {
  await page.goto('http://127.0.0.1:8000/');
    await page.locator('a:has-text("Register")').click();
    await page.locator('#name').fill('Playwright');
    await page.locator('#email').fill('playwright@yggg.com');
    await page.waitForTimeout(300);  // 300ms pause to help UI catch up
    await page.locator('#password').fill('fillingPassword');
    await page.waitForTimeout(300);  // 300ms pause to help UI catch up
    await page.locator('#password_confirmation').fill('fillingPassword');
    await page.getByRole('button', { name: 'Register' }).click();
    await expect(page.locator('h1:has-text("Bienvenue")')).toBeVisible();
});

test('Logging in', async ({ page }) => {
  await page.goto('http://127.0.0.1:8000/');
    await page.locator('a:has-text("Log in")').click();
    await page.locator('#email').fill('admin@example.com');
    await page.locator('#password').fill('admin123');
    await page.getByRole('button', { name: 'Log in' }).click();
    await page.locator('a:has-text("Mon compte")').click();
    await expect(page.locator('h1:has-text("Bienvenue")')).toBeVisible();
});
