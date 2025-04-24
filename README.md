
# To-Do List Application

A modern, interactive to-do list web application with a clean and attractive user interface.

## Overview

This application provides a sleek and intuitive interface for managing daily tasks. Built with modern web technologies, it allows users to add, mark as complete, and delete tasks with a visually appealing experience.

![To-Do List App Screenshot](/api/placeholder/600/400)

## Features

- **Beautiful UI Design**: Gradient animated header, clean task cards, and modern aesthetic
- **Interactive Elements**: Smooth hover effects and transitions on task items
- **Task Management**: Add new tasks, mark them as complete, and delete tasks
- **Responsive Design**: Works well on desktop and mobile devices
- **Visual Feedback**: Clear visual indication of task status

## Technologies Used

- **HTML5**: Structure of the web application
- **Tailwind CSS**: Styling and responsive design
- **Font Awesome**: Icons for enhanced visual appeal
- **CSS Animations**: Smooth transitions and visual effects

## Installation

1. Clone this repository or download the source code
2. Include the application in your web server's document root or deploy it to your preferred hosting service
3. Make sure your server supports form processing for the task management functionality

## Usage

### Adding a Task

1. Type your task in the input field at the top of the application
2. Click the "Tambah" button or press Enter to add the task to your list

### Completing a Task

1. Click the circular checkbox to the left of any task to mark it as complete
2. The task will be visually marked as complete with a strikethrough style

### Deleting a Task

1. Click the trash icon to the right of any task to remove it from your list

## Integration with Backend

This application is designed to work with a backend system that processes form submissions:

- **Add Task**: Form submits to `/task` endpoint with POST method
- **Mark as Complete**: Form submits to `/task{id}` endpoint with PATCH method
- **Delete Task**: Form submits to `/task{id}` endpoint with DELETE method

The backend should handle these requests appropriately and return updated data for the view.

## Customization

You can customize this application by:

- Modifying the color scheme in the CSS classes
- Changing the icons by replacing Font Awesome classes
- Adjusting the animations and transitions in the style section
- Adding additional features such as task categories or due dates

## How To Run
- Copy this folder to "htdocs"
- Run XAMPP on your device
- Open the "http://localhost/"

## License

[MIT License](LICENSE)

## Contributing
Teofilus Desius Ziraluo - (https://github.com/theoz06)

Contributions are welcome! Please feel free to submit a Pull Request.

## Support

If you encounter any issues or have questions, please open an issue in the repository.
