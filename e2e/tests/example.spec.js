// @ts-check
const { test, expect } = require('@playwright/test');

test('homepage', async ({ page }) => {
  await page.goto('https://localhost/');
  await expect(page).toHaveTitle('Welcome to API Platform!');
});

test('swagger', async ({ page }) => {
  await page.goto('https://localhost/docs');
  await expect(page).toHaveTitle('Hello API Platform - API Platform');
  await expect(page.locator('.operation-tag-content > span')).toHaveCount(10);
});

test('admin', async ({ page, browserName }) => {
  await page.goto('https://localhost/admin');
  await page.getByLabel('Create').click();
  await page.getByLabel('Title').fill('foo' + browserName);
  await page.getByLabel('Save').click();
/*  await expect(page).toHaveURL(/admin#\/demands/);
  await page.getByText('foo' + browserName).first().click();
  await expect(page).toHaveURL(/show$/);
  await page.getByLabel('Edit').first().click();
  await page.getByLabel('Title').fill('bar' + browserName);
  await page.getByLabel('Save').click();
  await expect(page).toHaveURL(/admin#\/demands/);
  await page.getByText('bar' + browserName).first().click();
 */
});
